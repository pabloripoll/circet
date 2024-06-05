<?php

namespace App\Http;

use App\Http\Request;
use App\Http\Response;
use App\Support\Debug;

class Route
{
    protected $request;

    public function __construct()
    {
        $this->request = new Request;
    }

    protected function register(string | array $path, $function, $id = null)
    {
        if ($path == $this->request->route()) {
            if (! is_array($function)) {
                $function();
            } else {
                $class = new $function[0];
                $method = $function[1];

                return ! $id ? $class->$method($this->request) : $class->$method($this->request, $id);
            }
        }
    }

    protected function identifier(string | array $path, $function)
    {
        $paths = is_array($path) ? $path : [$path];

        $array = (new Request)->routeParsed();
        $value = intval(end($array));

        foreach ($paths as $i => $path) {
            if (is_int($value)) {
                $exp = explode('/:', $path);
                $key = end($exp);
                $path = str_replace('/:'.$key, '/'.$value, $path);

                return (new self)->register($path, $function, $value);
            }
        }
    }

    public static function get(string | array $path, $function)
    {
        if ((new self)->request->method() == 'get') {
            return (new self)->identifier($path, $function);
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
            return (new self)->identifier($path, $function);
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
            return (new self)->identifier($path, $function);
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
