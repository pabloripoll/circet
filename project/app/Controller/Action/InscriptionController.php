<?php

namespace App\Controller\Action;

use App\Http\Request;
use App\Http\Response;
use App\Support\Debug;

class InscriptionController
{
    public function create(Request $request)
    {
        $response = new \stdClass;

        return (new Response)->json(['data' => $request->post('address')]);
    }

}