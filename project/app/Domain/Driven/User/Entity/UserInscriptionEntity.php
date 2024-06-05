<?php

namespace App\Domain\Driven\User\Entity;

use App\Domain\Driven\User\Model\UserInscriptionModel;
use App\Domain\Driven\User\Object\UserInscriptionObject;
use App\Domain\Driven\User\Repository\UserInscriptionRepository;

class UserInscriptionEntity
{
    public function model()
    {
        return new UserInscriptionModel;
    }

    public function object()
    {
        return new UserInscriptionObject;
    }

    public function validation()
    {
        return new UserInscriptionValidation;
    }

    public function repository()
    {
        return new UserInscriptionRepository;
    }

}
