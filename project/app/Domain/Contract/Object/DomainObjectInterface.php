<?php

namespace App\Domain\Contract\Object;

interface DomainObjectInterface
{
    public function value(object $row = null);
}