<?php

namespace App\Domain\Driven\User\Case;

use App\Domain\User;
use App\Database\Client\ClusterA;

class UserInscriptionDelCase
{
    private function table(): string
    {
        return User::inscription()->model()->table();
    }

    public function deleteRow(int $id): mixed
    {
        try {

            return (new ClusterA)->preset()->prepare("DELETE FROM `".$this->table()."` WHERE id=$id")->execute();

        } catch(\PDOException $e) {

            return ['error' => json_encode($e->getMessage())];
        }
    }

}
