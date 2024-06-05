<?php

namespace App\Domain\Contract\Validation;

use DateTime;

class DomainValidation
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
     * Link values
     */
    public function url(array $value, int $min = 16, int $max = 64): null | string
    {
        $key = array_key_first($value);
        $length = strlen($value[$key]);

        $length >= $min && $length <= $max && filter_var($value[$key], FILTER_VALIDATE_URL) ? : $this->error[$key] = 'invalid '. __FUNCTION__ .'() value';

        return isset($this->error[$key]) ? null : $value[$key];
    }

    public function email(array $value, int $min = 8, int $max = 32): null | string
    {
        $key = array_key_first($value);
        $length = strlen($value[$key]);

        $length >= $min && $length <= $max && filter_var($value[$key], FILTER_VALIDATE_EMAIL) ? : $this->error[$key] = 'invalid '. __FUNCTION__ .'() value';

        return isset($this->error[$key]) ? null : $value[$key];
    }

    /**
     * Link values
     */
    public function blob(array $value, int $min = null, int $max = null): null | string
    {
        $key = array_key_first($value);

        return $value[$key];
    }

    /**
     * Text values
     */
    public function basic(array $value, int $min = 1, int $max = 16): null | string
    {
        $key = array_key_first($value);

        preg_match('/^[A-Za-z0-9áéíóúÁÉÍÚÓñÑàèìòùÀÈÌÒÙçÇ@._\-\/ ]{'.$min.','.$max.'}$/', $value[$key]) ? : $this->error[$key] = 'invalid '. __FUNCTION__ .'() value';

        return isset($this->error[$key]) ? null : $value[$key];
    }

    /**
     * Calendar values
     */
    private function validate($date, $format = 'Y-m-d'): bool
    {
        $d = DateTime::createFromFormat($format, $date);

        return $d && $d->format($format) === $date;
    }

    public function dateYmd(array $value): null | string
    {
        $key = array_key_first($value);

        $this->validate($value[$key], 'Y-m-d') ? : $this->error[$key] = 'invalid '. __FUNCTION__ .'() value';

        return isset($this->error[$key]) ? null : $value[$key];
    }

    public function timestamp(array $value): null | string
    {
        $key = array_key_first($value);

        $this->validate($value[$key], 'Y-m-d H:i:s') ? : $this->error[$key] = 'invalid '. __FUNCTION__ .'() value';

        return isset($this->error[$key]) ? null : $value[$key];
    }

    /**
     * Number values
     */
    public function integer(array $value, int $min = 0, int $max = 20): null | int
    {
        $key = array_key_first($value);
        $length = strlen((string) $value[$key]);

        $length >= $min && $length <= $max && is_numeric($value[$key]) ? : $this->error[$key] = 'invalid '. __FUNCTION__ .'() value';

        return isset($this->error[$key]) ? null : $value[$key];
    }

}
