<?php

use App\Http\Route;
use App\Controller\View\ViewController;

Route::get('/', [ViewController::class, 'form']);

Route::get('/form', [ViewController::class, 'form']);

Route::get('/listing', [ViewController::class, 'listing']);
