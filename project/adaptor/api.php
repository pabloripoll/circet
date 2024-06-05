<?php

use App\Http\Route;
use App\Http\Response;
use App\Controller\View\ApiController;

Route::get('/', function() {
    return (new Response)->json(['data' => 'no resource']);
});

Route::post('/inscription', [ApiController::class, 'inscriptionCreate']);
Route::get('/inscription/:id', [ApiController::class, 'inscriptionRead']);
Route::put('/inscription/:id', [ApiController::class, 'inscriptionUpdate']);
Route::delete('/inscription/:id', [ApiController::class, 'inscriptionDelete']);

Route::get('/inscriptions', [ApiController::class, 'inscriptionAllRead']);