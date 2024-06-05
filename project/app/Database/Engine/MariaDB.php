<?php

namespace App\Database\Engine;

use PDO;
use PDOException;

class MariaDB
{
    public $_connection;

    /**
     * Only access by client with this engine extension
     */
	protected function connect(object $params)
	{
		$connection = null;

        try {
            $host = $params->host;
            $name = $params->name;
			$user = $params->user;
			$pass = $params->pass;

            $connection = new \PDO(
                "mysql:host=$host;dbname=$name;charset=utf8mb4", // DSN
                $user,
                $pass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_general_ci"
                ]
            );

        } catch (PDOException $exception) {
            return $exception->getMessage();
        }

        return $connection;
	}

    /**
     * Preset database connection to create or update register
     */
    public function preset()
	{
        return $this->_connection;
	}

    /**
     * Retrieves
     */
	public function select(string $query)
	{
		$result = [];

		try {
            $stmt = $this->_connection->prepare($query);

            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $row;
                }
            }

            return $result;

        } catch(PDOException $e) {

            return ['error' => json_encode($e->getMessage())];
        }
	}

}
