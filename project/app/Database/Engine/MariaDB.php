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
     * All statements have public access
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

        } catch(PDOException $e) {

            return $result[] = $e->getMessage();
        }
	}

    public function insert(string $query)
	{
		$result = null;

		try {
            $stmt = $this->_connection->prepare($query);
            $stmt->execute();

            return $this->_connection->lastInsertId();

        } catch(PDOException $e) {

            return $result[] = $e->getMessage();
        }
	}

    public function update(string $query)
	{
		$result = null;

		try {
            $stmt = $this->_connection->prepare($query);

            return $stmt->execute();

        } catch(PDOException $e) {

            return $result[] = $e->getMessage();
        }
	}

    public function delete(string $query)
	{
		$result = null;

		try {
            $stmt = $this->_connection->prepare($query);

            return $stmt->execute();

        } catch(PDOException $e) {

            return $result[] = $e->getMessage();
        }
	}

}
