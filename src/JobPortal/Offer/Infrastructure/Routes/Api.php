<?php

namespace Src\JobPortal\Offer\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;
use Src\JobPortal\Offer\Infrastructure\Controllers\Create\OfferCreateController;
use Src\JobPortal\Offer\Infrastructure\Controllers\Delete\OfferDeleteByIdController;
use Src\JobPortal\Offer\Infrastructure\Controllers\Search\All\OfferSearchAllController;
use Src\JobPortal\Offer\Infrastructure\Controllers\Search\ByCompanyId\OfferSearchByCompanyIdController;
use Src\JobPortal\Offer\Infrastructure\Controllers\Search\ById\OfferSearchByIdController;

Route::get('/', function () {
    dd('Welcome to JobPortal Project DDD. -- Offers');
});

Route::get('/all', OfferSearchAllController::class);
Route::post('/search-by-company-id', OfferSearchByCompanyIdController::class);
Route::post('/search-by-id', OfferSearchByIdController::class);
Route::post('/create', OfferCreateController::class);
Route::post('/delete-by-id', OfferDeleteByIdController::class);
