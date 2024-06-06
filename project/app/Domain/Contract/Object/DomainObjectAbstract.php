<?php

namespace App\Domain\Contract\Object;

abstract class DomainObjectAbstract
{
    public function safe(object $entity)
    {
        $reject = [];
        $passed = [];
        $output = new \stdClass;
        $validation = $this->validation();

        foreach ($entity as $key => $value) {
            if (! method_exists($validation, $key)){
                $reject[$key] = $key.' is not an object property';
            } else {
                $validation->$key($value) == $value ? $passed[$key] = trim($value) : $reject[$key] = $validation->errors()[$key];
            }
        }

        $required = $this->required();
        foreach ($required as $key) {
            if (! isset($entity->{$key}) || empty($entity->{$key})) {
                $reject[$key] = 'is required';
            }
        }

        if (count($reject) > 0) {
            $output->first = array_keys($reject)[0];
            $output->errors = $reject;
            $output->has_errors = true;

            return $output;
        }

        $output->has_errors = false;
        $output->entity = $entity;

        return $output;
    }

}
