<?php

/**
 * Kernel grab all requests to the application
 */

namespace App;

abstract class Kernel
{
    public $route;
    public $method;

    public function __construct()
    {
        $this->method = $this->server()['REQUEST_METHOD'];
        $this->route = $this->route();
    }

    /**
	 * Request server properties
	 */
    protected function server()
    {
        return $_SERVER;
    }

    /**
	 * Application host
	 */
    public function host($use_forwarded_host = false): object
    {
        $server = $this->server();
        $ssl  = (! empty($server['HTTPS'] ) && $server['HTTPS'] == 'on');
        $prot = strtolower($server['SERVER_PROTOCOL']);
        $prot = substr($prot, 0, strpos( $prot, '/')).(($ssl) ? 's' : '');
        $port = $server['SERVER_PORT'];
        $port = ((! $ssl && $port=='80') || ($ssl && $port=='443' ) ) ? '' : ':'.$port;
        $host = ($use_forwarded_host && isset($server['HTTP_X_FORWARDED_HOST'])) ? $server['HTTP_X_FORWARDED_HOST'] : (! isset($server['HTTP_HOST'] ) ? : $server['HTTP_HOST']);
        $host = isset($host) ? $host : $server['SERVER_NAME'].$port;

        return (object) [
            'protocol' => $prot,
            'domain' => $host,
            'port' => $server['SERVER_PORT']
        ];
    }

    /**
	 * Request method
	 */
    public function method(): string
    {
        return strtolower($this->server()['REQUEST_METHOD']);
    }

    /**
     * Route without url query
     */
    public function route(): string
    {
        return explode('?', $this->server()['REQUEST_URI'])[0];
    }

    /**
	 * Requested route parsed by forward slash
	 */
    public function routeParsed(): array
    {
        $parsed = [];
        foreach (explode('/', $this->route()) as $key => $value) {
            if ($value == '') {
                continue;
            }

            $parsed[] = $value;
        }

        ! empty ($parsed) ? : $parsed[] = '/';

        return $parsed;
    }

    /**
     * Get request params
     */
    public function get($value = null): mixed
    {
        if ($this->method() != __FUNCTION__) {
            return null;
        }

        $params = filter_input_array(INPUT_GET);

        return ! $value ? $params : (! isset($params[$value]) ? null : $params[$value]);
    }

    /**
     * Post request params
     */
    public function post($value = null): mixed
    {
        if ($this->method() != __FUNCTION__) {
            return null;
        }

        $params = filter_input_array(INPUT_POST) ?? json_decode(file_get_contents("php://input"), true);

        return ! $value ? $params : (! isset($params[$value]) ? null : $params[$value]);
    }

    /**
     * Post request params
     */
    public function files($value = null): mixed
    {
        return $_FILES;
    }

    /**
     * Post request params
     */
    public function input(): array | null
    {
        return json_decode(file_get_contents("php://input"), true);
    }

}
