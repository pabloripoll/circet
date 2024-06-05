<?php

use App\Http\Route;
use App\Controller\View\WebController;

Route::get('/', [WebController::class, 'form']);

Route::get('/form', [WebController::class, 'form']);

Route::get('/listing', [WebController::class, 'listing']);
