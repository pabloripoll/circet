<?php

namespace App\Database;

use PDO;
use PDOException;

class ClusterA
{
	private static $_instance;

	/**
	 * Singleton
	 */
    public static function sql()
	{
		return ! self::$_instance ? new self : self::$_instance;
	}

	/**
     * Magic method clone is empty to prevent duplication of connection
     */
	private function __clone() {}

	/**
	 * PDO Connection
	 */
	public function connection()
	{
		$connection = null;

        try {
            $host = '192.168.1.41:8889';
			$user = 'mariadb';
			$pass = '123456';
			$name = 'mariadb';

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

	public static function select(string $query)
	{
		$result = [];

		try {
            $stmt = (new self)->connection()->prepare($query);
            $stmt->execute();
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $row;
                }
            }
        } catch(PDOException $e) {
            $result[] = $e->getMessage();
        }

		return $result;
	}
}
