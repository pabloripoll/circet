<?php

namespace App\Controller\Validator;

class ValidatorController
{
    public function limit($value, $limit = null): mixed
    {
        $min = $limit[0] ?? 0;
        $max = $limit[1] ?? 1024;

        return strlen($value) < $min || strlen($value) > $max ? false : true;
    }

    public function id($value, $limit = null): mixed
    {
        if (! $this->limit($value, $limit) || $value < 1 || ! is_numeric($value)) {
            return null;
        }

        return intval($value);
    }

    public function boolean($value)
    {
        if (! ($value != 'true' || $value != 'false') || ! ($value != 1 || $value != 0)) {
            return null;
        }

        return boolval($value);
    }

    public function number($value, $limit = null): mixed
    {
        if (! $this->limit($value, $limit) || ! is_numeric($value)) {
            return null;
        }

        return $value;
    }

    public function email(string $value, $limit = null): mixed
    {
        if (! $this->limit($value, $limit) || filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            return null;
        }

        return $value;
    }

    public function password(string $value, $limit = null): mixed
    {
        if (! $this->limit($value, $limit) || ! preg_match("/^[A-Za-z0-9*$|@¿?¡!~·#%&()._\-\/ ]{8,32}$/", $value)) {
            return null;
        }

        return $value;
    }

    public function phone(string $value, $limit = null): mixed
    {
        if (! preg_match('/^[0-9+ \-]{9,32}$/', $value)) {
            return null;
        }

        return $value;
    }

    public function naming(string $value, $limit = null): mixed
    {
        if (! $this->limit($value, $limit) || ! preg_match('/[\\w?áéíóúÁÉÍÚÓñÑàèìòùÀÈÌÒÙçÇ.-]$/', $value)) {
            return null;
        }

        return $value;
    }

    public function text(string $value, $limit = null): mixed
    {
        if (! $this->limit($value, $limit) || ! preg_match('/[\\w?áéíóúÁÉÍÚÓñÑàèìòùÀÈÌÒÙçÇ¿¡!@+*!#$%&-]$/', $value)) {
            return null;
        }

        return $value;
    }

}
