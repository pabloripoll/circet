<?php

namespace App\Controller\View;

use App\Http\Response;

class ViewController
{
    public function home()
    {
        return (new Response)->view('home');
    }

    public function example()
    {
        return (new Response)->view('example');
    }

}