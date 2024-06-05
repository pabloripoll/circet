<?php

namespace App\Controller\View;

use App\Domain\User;
use App\Http\Request;
use App\Http\Response;

class ViewController
{
    public function home()
    {
        $data = new \stdClass;

        $data->page = 'home';

        return (new Response)->view('home', $data);
    }

    public function listing(Request $request)
    {
        $data = new \stdClass;

        $data->page = 'listing';

        $data->result = User::inscription()->get()->all();

        return (new Response)->view('listing', $data);
    }

    public function example()
    {
        return (new Response)->view('example', ['page' => 'example']);
    }

}