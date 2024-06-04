<?php

namespace App\Controller\View;

use App\Http\Response;

class ViewController
{
    protected function data()
    {
        return $data = new \stdClass;
    }

    public function home()
    {
        $data = $this->data();

        $data->page = 'home';

        return (new Response)->view('home', $data);
    }

    public function example()
    {
        $data = $this->data();

        $data->page = 'example';

        return (new Response)->view('example', $data);
    }

}