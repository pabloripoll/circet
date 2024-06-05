<?php

namespace App\Controller\Validator;

class ValidatorController
{
    public function text($value)
    {
        if (! preg_match('/^[A-Za-z0-9*$|@¿?¡!~·#%&()._\-\/]{8,32}$/', $value)) {
            return null;
        }

        return true;
    }

    public function email($value)
    {
        if (empty($value) || strlen($value) > 32 || filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            return null;
        }

        return true;
    }

    public function password($value)
    {
        if (! preg_match('/^[A-Za-z0-9*$|@¿?¡!~·#%&()._\-\/ ]{8,32}$/', $value)) {
            return null;
        }

        return true;
    }

}
