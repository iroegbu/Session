<?php
/**
 * Project: Storage.
 * User:    Iroegbu
 * Date:    3/13/2016
 * Time:    3:50 PM
 */

namespace Session\Exception;


class OutOfBoundsException extends \Exception
{

    public function __construct($key)
    {
        parent::__construct(printf("Undefined offset: %s", $key));
    }

} 