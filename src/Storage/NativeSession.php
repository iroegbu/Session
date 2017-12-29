<?php declare(strict_types=1);
/**
 * Project: Storage.
 * User:    Iroegbu
 */

namespace Session\Storage;

use Session\Exception\OutOfBoundsException;
use Session\Session;

class NativeSession implements Session
{

    public function __construct($path, $domain, $secure)
    {
        session_set_cookie_params(0, $path, $domain, $secure, true);
        session_start();
    }

    /**
     * Check if key exists
     *
     * @param $key
     * @return bool
     */
    public function exists($key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Get value given key
     *
     * @param $key
     * @return mixed
     * @throws OutOfBoundsException
     */
    public function get($key)
    {
        if ($this->exists($key)) {
            return $_SESSION[$key];
        }
        throw new OutOfBoundsException($key);
    }

    /**
     * Set value for key
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Unset a value by key
     *
     * @param $key
     * @return mixed
     */
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * Destroy all session data
     *
     * @return mixed
     */
    public function destroy()
    {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();
        session_start();
    }
}
