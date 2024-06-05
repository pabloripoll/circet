<?php

namespace App\Controller\Action;

use App\Domain\User;
use App\Http\Request;
use App\Http\Response;
use App\Support\Debug;

class InscriptionController
{
    public function create(Request $request)
    {
        $response = new \stdClass;

        $entity = (object) [
            'terms' => 1,
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

}