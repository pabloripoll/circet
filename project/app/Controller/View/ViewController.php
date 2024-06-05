<?php

namespace App\Controller\View;

use App\Domain\User;
use App\Http\Request;
use App\Http\Response;

class ViewController
{
    public function form()
    {
        $data = new \stdClass;

        $data->page = 'form';

        return (new Response)->view('form', $data);
    }

    public function listing(Request $request)
    {
        $data = new \stdClass;

        $data->page = 'listing';

        $data->result = User::inscription()->repository()->get()->all();

        return (new Response)->view('listing', $data);
    }

}