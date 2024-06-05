<?php

namespace App\Domain\Driven\User\Case;

use App\Domain\User;
use App\Database\Client\ClusterA;

class UserInscriptionSetCase
{
    private function table(): string
    {
        return User::inscription()->model()->table();
    }

    public function setRow(object $entity): mixed
    {
        try {
            $database = (new ClusterA)->preset();

            $params = '';
            ! isset($entity->id) ? : $params .= "id=:id, ";
            ! isset($entity->terms) ? : $params .= "terms=:terms, ";
            ! isset($entity->name) ? : $params .= "name=:name, ";
            ! isset($entity->surname) ? : $params .= "surname=:surname, ";
            ! isset($entity->email) ? : $params .= "email=:email, ";
            ! isset($entity->phone) ? : $params .= "phone=:phone, ";
            ! isset($entity->address) ? : $params .= "address=:address, ";

            $query = (! isset($entity->id) ? 'INSERT INTO' : 'UPDATE')." `".$this->table()."` SET ".(substr($params, 0, -2));
            $query = ! isset($entity->id) ? $query : $query.' WHERE id=:id';
            $stmt  = $database->prepare($query);

            ! isset($entity->id)      ? : $stmt->bindParam(":id", $entity->id);
            ! isset($entity->terms)   ? : $stmt->bindParam(":terms", $entity->terms);
            ! isset($entity->name)    ? : $stmt->bindParam(":name", $entity->name);
            ! isset($entity->surname) ? : $stmt->bindParam(":surname", $entity->surname);
            ! isset($entity->email)   ? : $stmt->bindParam(":email", $entity->email);
            ! isset($entity->phone)   ? : $stmt->bindParam(":phone", $entity->phone);
            ! isset($entity->address) ? : $stmt->bindParam(":address", $entity->address);

            $stmt->execute();

            return ! isset($entity->id) ? $database->lastInsertId() : $stmt->rowCount();

        } catch(\PDOException $e) {

            return ['error' => json_encode($e->getMessage())];
        }
    }

}
