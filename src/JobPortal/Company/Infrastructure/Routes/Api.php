<?php

namespace Src\JobPortal\Candidate\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;
use Src\JobPortal\Company\Infrastructure\Controllers\Search\CompanySearchAllController;
use Src\JobPortal\Company\Infrastructure\Controllers\Create\CompanyCreateController;

Route::get('/', function () {
    dd('Welcome to JobPortal Project DDD. -- Company');
});

Route::get('/all', CompanySearchAllController::class);
Route::post('/create', CompanyCreateController::class);

