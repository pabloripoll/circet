<?php

namespace App\Domain\Driven\User\Object;

use stdClass;
use App\Domain\Driven\User\Validation\UserInscriptionValidation;

class UserInscriptionObject extends stdClass
{
    public function safe()
    {
        $object = new UserInscriptionValidation;
        if (! $object->bulk($this)) {
            $this->error = $object->error();

            return false;
        }

        return true;
    }

    public function value(object $row = null): object
    {
        $object = new stdClass;

        $object->id = $row->id ?? null;
        $object->terms = $row->terms ?? null;
        $object->name = $row->name ?? null;
        $object->surname = $row->surname ?? null;
        $object->email = $row->email ?? null;
        $object->phone = $row->phone ?? null;
        $object->address = $row->address ?? null;
        $object->created_at = $row->created_at ?? null;
        $object->updated_at = $row->updated_at ?? null;

        return $object;
    }

    /**
     * Object inputs
     */

    public function id(int $id): int
    {
        return $id;
    }

    public function terms(int $terms): int
    {
        return $terms;
    }

    public function name(string $name): string
    {
        return $name;
    }

    public function surname(string $surname): string
    {
        return $surname;
    }

    public function email(string $email): string
    {
        return $email;
    }

    public function phone(string $phone): string
    {
        return $phone;
    }

    public function address(string $address): string
    {
        return $address;
    }

    public function created_at(string $created_at): string
    {
        return $created_at;
    }

    public function updated_at(string $updated_at): string
    {
        return $updated_at;
    }

}
