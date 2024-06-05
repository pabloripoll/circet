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
        $object->uid = $row->uid ?? null;
        $object->client_id = $row->client_id ?? null;
        $object->is_active = $row->is_active ?? null;
        $object->lang_id = $row->lang_id ?? null;
        $object->user = $row->user ?? null;
        $object->password = $row->password ?? null;
        $object->passquest = $row->passquest ?? null;
        $object->pin = $row->pin ?? null;
        $object->email = $row->email ?? null;
        $object->name = $row->name ?? null;
        $object->surname = $row->surname ?? null;
        $object->phone = $row->phone ?? null;
        $object->job = $row->job ?? null;
        $object->picture = $row->picture ?? null;
        $object->created_at = $row->created_at ? $row->created_at->toDateTimeString() : null;
        $object->updated_at = $row->updated_at ? $row->updated_at->toDateTimeString() : null;
        $object->deleted_at = $row->deleted_at ? $row->deleted_at->toDateTimeString() : null;

        return $object;
    }

    /**
     * Object inputs
     */

    public function id(int $id): int
    {
        return $id;
    }

    public function uid(int $uid): int
    {
        return $uid;
    }

    public function client_id(int $client_id): int
    {
        return $client_id;
    }

    public function is_active(bool $is_active): bool
    {
        return $is_active;
    }

    public function lang_id(int $lang_id): int
    {
        return $lang_id;
    }

    public function user(string $user): string
    {
        return $user;
    }

    public function password(string $password): string
    {
        return $password;
    }

    public function passquest(string $passquest): string
    {
        return $passquest;
    }

    public function pin(string $pin): string
    {
        return $pin;
    }

    public function email(string $email): string
    {
        return $email;
    }

    public function name(string $name): string
    {
        return $name;
    }

    public function surname(string $surname): string
    {
        return $surname;
    }

    public function phone(string $phone): string
    {
        return $phone;
    }

    public function job(string $job): string
    {
        return $job;
    }

    public function picture(string $picture): string
    {
        return $picture;
    }

    public function created_at(string $created_at): string
    {
        return $created_at;
    }

    public function updated_at(string $updated_at): string
    {
        return $updated_at;
    }

    public function deleted_at(string $deleted_at): string
    {
        return $deleted_at;
    }

}
