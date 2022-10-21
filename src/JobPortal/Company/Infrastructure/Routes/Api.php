<?php

namespace Src\JobPortal\Candidate\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;
use Src\JobPortal\Company\Infrastructure\Controllers\Create\CompanyCreateController;
use Src\JobPortal\Company\Infrastructure\Controllers\Delete\CompanyDeleteByIdController;
use Src\JobPortal\Company\Infrastructure\Controllers\Search\All\CompanySearchAllController;
use Src\JobPortal\Company\Infrastructure\Controllers\Search\ById\CompanySearchByIdController;
use Src\JobPortal\Company\Infrastructure\Controllers\Search\ByName\CompanySearchByNameController;

Route::get('/', function () {
    dd('Welcome to JobPortal Project DDD. -- Company');
});

Route::get('/all', CompanySearchAllController::class);
Route::post('/search-by-name', CompanySearchByNameController::class);
Route::post('/search-by-id', CompanySearchByIdController::class);
Route::post('/create', CompanyCreateController::class);
Route::post('/delete-by-id', CompanyDeleteByIdController::class);
