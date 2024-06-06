<?php

namespace App\Controller\View;

use App\Http\Request;
use App\Http\Response;
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
        $request = (object) $request->input();

        $entity = (object) [
            'terms' => $request->terms ?? '',
            'name' => $request->name ?? '',
            'surname' => $request->surname ?? '',
            'email' => $request->email ?? '',
            'phone' => $request->phone ?? '',
            'address' => $request->address ?? ''
        ];

        $result = (new InscriptionController)->update($entity, $id);

        if (isset($result['error'])) {
            return (new Response)->json($result);
        }

        return (new Response)->json(['updated' => $result]);
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
