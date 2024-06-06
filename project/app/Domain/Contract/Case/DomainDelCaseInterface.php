<?php

namespace App\Domain\Contract\Case;

interface DomainDelCaseInterface
{
    public function delete(int $id): mixed;
}
