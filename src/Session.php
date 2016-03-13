<?php
/**
 * Project: Storage.
 * User:    Iroegbu
 */

namespace Session;


/**
 * Interface Storage
 * @package Storage
 */
interface Session
{

    /**
     * Check if key exists
     *
     * @param $key
     * @return bool
     */
    public function exists($key);

    /**
     * Get value given key
     *
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * Set value for key
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);

    /**
     * Unset a value by key
     *
     * @param $key
     * @return mixed
     */
    public function remove($key);

    /**
     * Destroy all session data
     *
     * @return mixed
     */
    public function destroy();
}
