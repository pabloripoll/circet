<?php

namespace App\Middleware;

class ApiAdaptorMiddleware
{
    /**
     * Adapts real uri requests for api routes - do not remove!
     *
     */
    public function __construct()
    {
        $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], 4);

        ! empty($_SERVER['REQUEST_URI']) ? : $_SERVER['REQUEST_URI'] = '/';
    }

}
