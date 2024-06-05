<?php

namespace App\Controller\View;

use App\Domain\User;
use App\Http\Request;
use App\Http\Response;
use App\Controller\Domain\InscriptionController;

class WebController
{
    public function form(Request $request)
    {
        $data = new \stdClass;

        $data->page = 'form';

        if ($request->get('id')) {
            $data->register = (new InscriptionController)->getById($request->get('id'));
        }

        return (new Response)->view('form', $data);
    }

    public function listing(Request $request)
    {
        $data = new \stdClass;

        $data->page = 'listing';

        $data->result = (new InscriptionController)->getAll();

        return (new Response)->view('listing', $data);
    }

}