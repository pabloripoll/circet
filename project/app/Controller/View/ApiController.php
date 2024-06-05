<?php

namespace App\Controller\View;

use App\Domain\User;
use App\Http\Request;
use App\Http\Response;
use App\Support\Debug;
use App\Controller\Domain\InscriptionController;

class ApiController
{
    public function inscriptionCreate(Request $request)
    {
        $entity = (object) [
            'terms' => $request->post('terms') ?? '',
            'name' => $request->post('name') ?? '',
            'surname' => $request->post('surname') ?? '',
            'email' => $request->post('email') ?? '',
            'phone' => $request->post('phone') ?? '',
            'address' => $request->post('address') ?? ''
        ];

        $result = (new InscriptionController)->create($entity);

        if (isset($result['error'])) {
            return (new Response)->json($result);
        }

        return (new Response)->json(['created' => $result]);
    }

    public function inscriptionUpdate(Request $request, $id)
    {
        /* entity = (object) [
            'terms' => $request->post('terms') ?? '',
            'name' => $request->post('name') ?? '',
            'surname' => $request->post('surname') ?? '',
            'email' => $request->post('email') ?? '',
            'phone' => $request->post('phone') ?? '',
            'address' => $request->post('address') ?? ''
        ];

        $result = (new InscriptionController)->create($entity);

        if (isset($result['error'])) {
            return (new Response)->json($result);
        } */

        return (new Response)->json(['updated' => 1]);
    }

    public function inscriptionDelete(Request $request, int $id)
    {
        $result = (new InscriptionController)->delete($id);

        if (isset($result['error'])) {
            return (new Response)->json($result);
        }

        return (new Response)->json(['deleted' => $id]);
    }

}
