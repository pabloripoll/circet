<?php

namespace App\Domain\Driven\User\Object;

use App\Domain\Contract\Object\DomainObjectAbstract;
use App\Domain\Contract\Object\DomainObjectInterface;
use App\Domain\Driven\User\Validation\UserInscriptionValidation;

class UserInscriptionObject extends DomainObjectAbstract implements DomainObjectInterface
{
    /**
     * Required from abstract methods
     */
    public function validation(): object
    {
        return new UserInscriptionValidation;
    }

    /**
     * Required for inputs
     */
    public function required(): array
    {
        return [
            'terms',
            'name',
            'surname',
            'email',
            'address'
        ];
    }

    /**
     * Output normalized value or required properties
     */
    public function value(object $row = null): object
    {
        $object = new \stdClass;

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
