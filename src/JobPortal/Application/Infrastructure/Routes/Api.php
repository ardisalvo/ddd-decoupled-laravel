<?php

namespace Src\JobPortal\Application\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;
use Src\JobPortal\Application\Infrastructure\Controllers\Create\ApplicationCreateController;
use Src\JobPortal\Application\Infrastructure\Controllers\Delete\ApplicationDeleteByIdController;
use Src\JobPortal\Application\Infrastructure\Controllers\Search\All\ApplicationSearchAllController;
use Src\JobPortal\Application\Infrastructure\Controllers\Search\ByCandidateId\ApplicationSearchByCandidateIdController;
use Src\JobPortal\Application\Infrastructure\Controllers\Search\ById\ApplicationSearchByIdController;
use Src\JobPortal\Application\Infrastructure\Controllers\Search\ByOfferId\ApplicationSearchByOfferIdController;

Route::get('/', function () {
    dd('Welcome to JobPortal Project DDD. -- Applications');
});

Route::get('/all', ApplicationSearchAllController::class);
Route::post('/search-by-candidate-id', ApplicationSearchByCandidateIdController::class);
Route::post('/search-by-offer-id', ApplicationSearchByOfferIdController::class);
Route::post('/search-by-id', ApplicationSearchByIdController::class);
Route::post('/create', ApplicationCreateController::class);
Route::post('/delete-by-id', ApplicationDeleteByIdController::class);
