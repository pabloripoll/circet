<?php

namespace App\Adaptor;

use App\Http\Route;
use App\Http\Response;
use App\Controller\View\ViewController;

Route::get('/', [ViewController::class, 'home']);

Route::get('/home', [ViewController::class, 'home']);

Route::get('/example', [ViewController::class, 'example']);
