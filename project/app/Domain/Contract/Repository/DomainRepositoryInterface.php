<?php

namespace App\Domain\Contract\Repository;

interface DomainRepositoryInterface
{
    public function get(): mixed;

    public function set(object $entity = null): mixed;

    public function delete(int $id = null): mixed;

}