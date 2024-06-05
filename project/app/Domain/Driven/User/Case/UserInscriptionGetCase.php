<?php

namespace App\Domain\Driven\User\Case;

use App\Domain\User;
use App\Database\Client\ClusterA;

class UserInscriptionGetCase
{
    private function table(): string
    {
        return User::inscription()->model()->table();
    }

    public function all()
    {
        $query = "SELECT * FROM ".$this->table();

        $result = (new ClusterA)->select($query);

        return $result;
    }

}
