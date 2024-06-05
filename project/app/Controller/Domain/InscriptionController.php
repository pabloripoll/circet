<?php

namespace App\Controller\Domain;

use App\Domain\User;
use App\Http\Request;
use App\Http\Response;
use App\Support\Debug;

class InscriptionController
{
    public function getAll()
    {
        return User::inscription()->repository()->get()->all();
    }

    public function getById($id)
    {
        $id = intval($id);

        return User::inscription()->repository()->get()->byId($id);
    }

    public function create(object $entity)
    {
        $i = 0;
        $required = ['name', 'surname', 'email', 'address'];
        foreach ($entity as $key => $value) {
            if (in_array($key, $required) && empty($value)) {
                $i++;
            }
        }

        if ($i > 0) {
            return ['error' => 'complete required fields'];
        }

        $entity->terms = $entity->terms == 'false' ? 0 : 1;
        if (! $entity->terms) {
            return ['error' => 'terms must be accepted'];
        }

        return User::inscription()->repository()->set($entity);
    }

    public function update(object $entity, $id)
    {
        $i = 0;
        $required = ['name', 'surname', 'email', 'address'];
        foreach ($entity as $key => $value) {
            if (in_array($key, $required) && empty($value)) {
                $i++;
            }
        }

        if ($i > 0) {
            return ['error' => 'complete required fields'];
        }

        $entity->terms = $entity->terms == 'false' ? 0 : 1;
        if (! $entity->terms) {
            return ['error' => 'terms must be accepted'];
        }

        if (! is_numeric($id)) {
            return ['error' => 'id is not valid'];
        }

        $entity->id = intval($id);

        User::inscription()->repository()->set($entity);

        return $entity->id;
    }

    public function delete($id)
    {
        if (! is_numeric($id)) {
            return ['error' => 'id is not numeric'];
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
