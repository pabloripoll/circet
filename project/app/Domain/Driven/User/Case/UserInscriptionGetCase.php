<?php

namespace App\Domain\Driven\User\Case;

use App\Domain\User;
use App\Database\Client\ClusterA;

class UserInscriptionGetCase
{
    protected function model(): object
    {
        return User::main()->model();
    }

    public function selectAll()
    {
        return (new ClusterA)->select("SELECT * FROM inscriptions");
    }

}
