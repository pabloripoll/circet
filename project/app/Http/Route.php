<?php

namespace App\Http;

use App\Http\Request;

class Route
{
    protected $request;

    public function __construct()
    {
        $this->request = new Request;
    }

    protected function register(string | array $path, $function)
    {
        if ($path == $this->request->route()) {
            if (! is_array($function)) {
                $function();
            } else {
                $class = new $function[0];
                $method = $function[1];

                return $class->$method($this->request);
            }
        }
    }

    public static function get(string | array $path, $function)
    {
        if ((new self)->request->method() == 'get') {
            return (new self)->register($path, $function);
        }
    }

    public static function post(string | array $path, $function)
    {
        if ((new self)->request->method() == 'post') {
            return (new self)->register($path, $function);
        }
    }

    public static function put(string | array $path, $function)
    {
        if ((new self)->request->method() == 'put') {
            return (new self)->register($path, $function);
        }
    }

    public static function patch(string | array $path, $function)
    {
        if ((new self)->request->method() == 'patch') {
            return (new self)->register($path, $function);
        }
    }

    public static function delete(string | array $path, $function)
    {
        if ((new self)->request->method() == 'delete') {
            return (new self)->register($path, $function);
        }
    }

    public static function head(string | array $path, $function)
    {
        if ((new self)->request->method() == 'head') {
            return (new self)->register($path, $function);
        }
    }

    public static function options(string | array $path, $function)
    {
        if ((new self)->request->method() == 'options') {
            return (new self)->register($path, $function);
        }
    }

}
