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

}
