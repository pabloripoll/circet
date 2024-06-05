<?php

namespace App\Domain\Driven\User\Case;

use App\Domain\User;
use App\Database\Client\ClusterA;

class UserInscriptionSetCase
{
    protected function model(): object
    {
        return User::main()->model();
    }

    public function setRow(object $entity): object
    {
        $row = ! isset($entity->id) ? $this->model() : $this->model()->find($entity->id);

        ! isset($entity->uid) ? : $row->uid = $entity->uid;

        ! isset($entity->client_id) ? : $row->client_id = $entity->client_id;

        ! isset($entity->is_active) ? : $row->is_active = $entity->is_active;

        ! isset($entity->lang_id) ? : $row->lang_id = $entity->lang_id;

        ! isset($entity->user) ? : $row->user = $entity->user;

        ! isset($entity->password) ? : $row->password = Hash::make($entity->password);

        ! isset($entity->passquest) ? : $row->passquest = $entity->passquest;

        ! isset($entity->pin) ? : $row->pin = $entity->pin;

        ! isset($entity->email) ? : $row->email = $entity->email;

        ! isset($entity->name) ? : $row->name = $entity->name;

        ! isset($entity->surname) ? : $row->surname = $entity->surname;

        ! isset($entity->phone) ? : $row->phone = $entity->phone;

        ! isset($entity->job) ? : $row->job = $entity->job;

        ! isset($entity->picture) ? : $row->picture = $entity->picture;

        ! isset($entity->deleted_at) ? : $row->deleted_at = $entity->deleted_at;

        $row->save();

        return $row;
    }

}
