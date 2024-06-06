<?php

namespace App\Domain\Driven\User\Validation;

use App\Domain\Contract\Validation\DomainValidationAbstract;

/**
 * Entity properties validation
 *
 * Methods valid output value must be clean as input value
 */
class UserInscriptionValidation extends DomainValidationAbstract
{
    public function id($value)
    {
        return $this->_val()->id($value) ? $value : $this->error = [__FUNCTION__ => 'not valid'];
    }

    public function terms($value)
    {
        return $this->_val()->boolean($value) ? $value : $this->error = [__FUNCTION__ => 'not valid'];
    }

    public function name($value)
    {
        return $this->_val()->naming($value, [2, 32]) ? $value : $this->error = [__FUNCTION__ => 'not valid'];
    }

    public function surname($value)
    {
        return $this->_val()->naming($value, [4, 32]) ? $value : $this->error = [__FUNCTION__ => 'not valid'];
    }

    public function email($value)
    {
        return $this->_val()->email($value, [8, 32]) ? $value : $this->error = [__FUNCTION__ => 'not valid'];
    }

    public function phone($value)
    {
        return $this->_val()->phone($value, [9, 32]) ? $value : $this->error = [__FUNCTION__ => 'not valid'];
    }

    public function address($value)
    {
        return $this->_val()->text($value, [8, 64]) ? $value : $this->error = [__FUNCTION__ => 'not valid'];
    }

}
