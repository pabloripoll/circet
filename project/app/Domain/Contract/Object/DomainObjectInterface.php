<?php

namespace App\Domain\Contract\Object;

interface DomainObjectInterface
{
    public function validation(): object;

    public function required(): array;

    public function value(object $row = null): object;
}