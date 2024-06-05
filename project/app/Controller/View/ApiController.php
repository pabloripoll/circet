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
            'terms' => trim($request->post('terms')) ?? '',
            'name' => trim($request->post('name')) ?? '',
            'surname' => trim($request->post('surname')) ?? '',
            'email' => trim($request->post('email')) ?? '',
            'phone' => trim($request->post('phone')) ?? '',
            'address' => trim($request->post('address')) ?? ''
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
            'terms' => trim($request->terms) ?? '',
            'name' => trim($request->name) ?? '',
            'surname' => trim($request->surname) ?? '',
            'email' => trim($request->email) ?? '',
            'phone' => trim($request->phone) ?? '',
            'address' => trim($request->address) ?? ''
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
