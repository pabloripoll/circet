<?php

namespace App\Domain\Contract\Case;

interface DomainGetCaseInterface
{
    public function object(object | array $result): object | array;
}
