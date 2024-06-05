<?php

namespace App\Domain\Driven\User\Repository;

use App\Domain\Driven\User\Case\UserIncriptionGetCase;
use App\Domain\Driven\User\Case\UserIncriptionSetRowCase;

class UserIncriptionRepository
{
    public function get()
    {
        return new UserIncriptionGetCase;
    }

    public function set(object $entity = null): object
    {
        if ($entity) {
            return (new UserIncriptionSetRowCase)->setRow($entity);
        }

        return new UserIncriptionSetRowCase;
    }

}
