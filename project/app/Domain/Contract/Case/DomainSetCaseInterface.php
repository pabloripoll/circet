<?php

namespace App\Domain\Contract\Case;

interface DomainSetCaseInterface
{
    public function set(object $entity): mixed;
}
