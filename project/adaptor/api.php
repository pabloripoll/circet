<?php

use App\Http\Route;
use App\Http\Response;
use App\Controller\Action\InscriptionController;

Route::get('/', function() {
    return (new Response)->json(['data' => 'no resource']);
});

Route::get('/inscription', [InscriptionController::class, 'read']);

Route::put('/inscription', [InscriptionController::class, 'update']);

Route::post('/inscription', [InscriptionController::class, 'create']);

Route::delete('/inscription', [InscriptionController::class, 'delete']);

Route::get('/inscription/listing', [InscriptionController::class, 'read']);
