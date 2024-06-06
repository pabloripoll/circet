<?php

namespace App\Domain\Contract\Validation;

use App\Controller\Validator\ValidatorController;

abstract class DomainValidationAbstract
{
    /**
     * Error register property
     */
    public $error = [];

    /**
     * Get errors register
     */
    public function errors(): array
    {
        return $this->error;
    }

    /**
     * Validation service from infrastructure
     */
    protected function _val()
    {
        return new ValidatorController;
    }

}
