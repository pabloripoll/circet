<?php

namespace App\Domain\Contract\Case;

interface DomainSetCaseInterface
{
    public function model(): object;

    public function row(object $input): object;
}
