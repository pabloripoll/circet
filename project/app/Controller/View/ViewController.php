<?php

namespace App\Controller\View;

use App\Http\Request;
use App\Http\Response;
use App\Database\ClusterA;
use App\Support\Debug;
use PDO;

class ViewController
{
    public function home()
    {
        $data = new \stdClass;

        $data->page = 'home';

        $data->result = ClusterA::sql()->select("SELECT * FROM users");

        return (new Response)->view('home', $data);
    }

    public function listing(Request $request)
    {
        $data = new \stdClass;

        $data->page = 'listing';

        return (new Response)->view('listing', $data);
    }

    public function example()
    {
        return (new Response)->view('example', ['page' => 'example']);
    }

}