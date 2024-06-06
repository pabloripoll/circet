<?php

namespace App\Controller\Domain;

use App\Domain\User;
use App\Support\Debug;

class InscriptionController
{
    public function getAll()
    {
        return User::inscription()->repository()->get()->all();
    }

    public function getById($id)
    {
        $validation = User::inscription()->object()->validation()->id($id);

        if ($validation != $id) {
            return ['error' => 'id not valid'];
        }

        return User::inscription()->repository()->get()->byId($id);
    }

    public function create(object $entity)
    {
        $validate = User::inscription()->object()->safe($entity);

        if ($validate->has_errors) {
            return ['error' => '['.$validate->first.'] '.$validate->errors[$validate->first]];
        }

        $entity = $validate->entity;

        $entity->terms = $entity->terms == 'false' ? 0 : 1;
        if (! $entity->terms) {
            return ['error' => 'terms must be accepted'];
        }

        return User::inscription()->repository()->set($entity);
    }

    public function update(object $entity, $id)
    {
        $validate = User::inscription()->object()->safe($entity);
        if ($validate->has_errors) {
            return ['error' => '['.$validate->first.'] '.$validate->errors[$validate->first]];
        }
        $entity = $validate->entity;

        $validation = User::inscription()->object()->validation()->id($id);
        if ($validation != $id) {
            return ['error' => 'id not valid'];
        }
        $entity->id = $id;

        $entity->terms = $entity->terms == 'false' ? 0 : 1;
        if (! $entity->terms) {
            return ['error' => 'terms must be accepted'];
        }

        User::inscription()->repository()->set($entity);

        return $entity->id;
    }

    public function delete($id)
    {
        $validation = User::inscription()->object()->validation()->id($id);

        if ($validation != $id) {
            return ['error' => 'id not valid'];
        }

        $result = User::inscription()->repository()->get()->byId($id);
        if (! $result) {
            return ['error' => 'resource not found'];
        }

        $result = User::inscription()->repository()->delete($id);
        if (! $result) {
            return ['error' => 'resource cannot be deleted'];
        }

        return $id;
    }

}
