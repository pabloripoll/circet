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
        //$response = new \stdClass;

        $entity = (object) [
            'terms' => 1,
            'name' => $request->post('firstName'),
            'surname' => $request->post('lastName'),
            'email' => $request->post('email'),
            'phone' => $request->post('phone'),
            'address' => $request->post('address'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $response = User::inscription()->repository()->set($entity);

        return (new Response)->json(['data' => $response]);
    }

}