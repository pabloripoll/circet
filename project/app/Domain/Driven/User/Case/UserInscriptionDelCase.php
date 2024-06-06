<?php

namespace App\Domain\Driven\User\Case;

use App\Domain\User;
use App\Database\Client\ClusterA;
use App\Domain\Contract\Case\DomainDelCaseInterface;

class UserInscriptionDelCase
{
    private function table(): string
    {
        return User::inscription()->model()->table();
    }

    public function delete(int $id): mixed
    {
        try {

            return (new ClusterA)->preset()->prepare("DELETE FROM `".$this->table()."` WHERE id=$id")->execute();

        } catch(\PDOException $e) {

            return ['error' => json_encode($e->getMessage())];
        }
    }

}
