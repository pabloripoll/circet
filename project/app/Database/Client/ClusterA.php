<?php

namespace App\Database\Client;

use App\Database\Engine\MariaDB;

class ClusterA extends MariaDB
{
    /**
     * Restricted access to connection params
     */
	private function getConnection()
	{
        $params = new \stdClass;
        $params->host = '192.168.1.41:8889';
        $params->user = 'mariadb';
        $params->pass = '123456';
        $params->name = 'mariadb';

        return (new MariaDB)->connect($params);
	}

    /**
     * Public access to connect
     */
    public function __construct()
	{
        $this->_connection = $this->getConnection();
	}

}
