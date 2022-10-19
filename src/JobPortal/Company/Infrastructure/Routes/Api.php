<?php

namespace Src\JobPortal\Candidate\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;
use Src\JobPortal\Company\Application\Search\CompanySearchByNameUseCase;
use Src\JobPortal\Company\Infrastructure\Controllers\Search\CompanySearchAllController;
use Src\JobPortal\Company\Infrastructure\Controllers\Create\CompanyCreateController;
use Src\JobPortal\Company\Infrastructure\Controllers\Search\CompanySearchByNameController;

Route::get('/', function () {
    dd('Welcome to JobPortal Project DDD. -- Company');
});

Route::get('/all', CompanySearchAllController::class);
Route::post('/search-by-name', CompanySearchByNameController::class);
Route::post('/create', CompanyCreateController::class);

