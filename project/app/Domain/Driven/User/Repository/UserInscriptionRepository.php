<?php

namespace App\Domain\Driven\User\Repository;

use App\Domain\Driven\User\Case\UserInscriptionGetCase;
use App\Domain\Driven\User\Case\UserInscriptionSetCase;
use App\Domain\Driven\User\Case\UserInscriptionDelCase;

class UserInscriptionRepository
{
    public function get(): mixed
    {
        return new UserInscriptionGetCase;
    }

    public function set(object $entity = null): mixed
    {
        if ($entity) {
            return (new UserInscriptionSetCase)->setRow($entity);
        }

        return new UserInscriptionSetCase;
    }

    public function delete(int $id = null): mixed
    {
        if ($id) {
            return (new UserInscriptionDelCase)->deleteRow($id);
        }

        return new UserInscriptionDelCase;
    }

}
