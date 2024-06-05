<?php

use App\Http\Route;
use App\Controller\View\ViewController;

Route::get('/', [ViewController::class, 'home']);

Route::get('/home', [ViewController::class, 'home']);

Route::get('/listing', [ViewController::class, 'listing']);

Route::get('/example', [ViewController::class, 'example']);
