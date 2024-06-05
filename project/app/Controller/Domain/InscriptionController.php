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
        $id = (int) $id;

        return User::inscription()->repository()->get()->byId($id);
    }

    public function create(Request $request)
    {
        $response = new \stdClass;

        $entity = (object) [
            'terms' => $request->post('terms'),
            'name' => $request->post('name'),
            'surname' => $request->post('surame'),
            'email' => $request->post('email'),
            'phone' => $request->post('phone'),
            'address' => $request->post('address')
        ];

        $result = User::inscription()->repository()->set($entity);

        if (isset($result['error'])) {
            return (new Response)->json($result);
        }

        return (new Response)->json(['data' => $result]);
    }

    public function read(Request $request)
    {
        $response = new \stdClass;


        return (new Response)->json(['data' => $request->get('id')]);
    }

    public function update(Request $request)
    {
        $response = new \stdClass;

        $id = $request->get('id');

        $entity = (object) [
            'id' => $request->post('id'),
            'terms' => $request->post('terms'),
            'name' => $request->post('name'),
            'surname' => $request->post('surame'),
            'email' => $request->post('email'),
            'phone' => $request->post('phone'),
            'address' => $request->post('address')
        ];

        $result = User::inscription()->repository()->set($entity);

        if (isset($result['error'])) {
            return (new Response)->json($result);
        }

        return (new Response)->json(['updated' => $result]);
    }

    public function delete(Request $request)
    {
        $response = new \stdClass;

        $id = $request->get('id');

        $result = User::inscription()->repository()->delete($id);

        if (isset($result['error'])) {
            return (new Response)->json($result);
        }

        return (new Response)->json(['deleted' => $id]);
    }
}