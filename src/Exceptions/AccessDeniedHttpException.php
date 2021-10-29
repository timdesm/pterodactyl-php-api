<?php

namespace Timdesm\PterodactylPhpApi\Exceptions;

use Exception;

class AccessDeniedHttpException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('This action is unauthorized.');
    }
}
