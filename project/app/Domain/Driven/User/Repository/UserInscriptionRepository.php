<?php

namespace App\Domain\Driven\User\Repository;

use App\Domain\Contract\Repository\DomainRepositoryInterface;
use App\Domain\Driven\User\Case\UserInscriptionGetCase;
use App\Domain\Driven\User\Case\UserInscriptionSetCase;
use App\Domain\Driven\User\Case\UserInscriptionDelCase;

class UserInscriptionRepository implements DomainRepositoryInterface
{
    public function get(): mixed
    {
        return new UserInscriptionGetCase;
    }

    public function set(object $entity = null): mixed
    {
        if ($entity) {
            return (new UserInscriptionSetCase)->set($entity);
        }

        return new UserInscriptionSetCase;
    }

    public function delete(int $id = null): mixed
    {
        if ($id) {
            return (new UserInscriptionDelCase)->delete($id);
        }

        return new UserInscriptionDelCase;
    }

}
