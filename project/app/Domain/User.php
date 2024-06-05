<?php

namespace App\Domain;

use App\Domain\Driven\User\Entity\UserInscriptionEntity;

class User
{
    public static function inscription()
    {
        return new UserInscriptionEntity;
    }

}
