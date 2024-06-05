<?php

namespace App\Domain\Contract\Repository;

interface DomainRepositoryInterface
{
    public function get();

    public function set(object $entity = null);

}