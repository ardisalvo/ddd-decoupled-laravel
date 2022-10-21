<?php

namespace Src\JobPortal\Candidate\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Create\CandidateCreateController;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Delete\CandidateDeleteByIdController;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Search\All\CandidateSearchAllController;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Search\ByEmail\CandidateSearchByEmailController;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Search\ById\CandidateSearchByIdController;

Route::get('/', function () {
    dd('Welcome to JobPortal Project DDD. -- Candidate');
});

Route::get('/all', CandidateSearchAllController::class);
Route::post('/search-by-email', CandidateSearchByEmailController::class);
Route::post('/search-by-id', CandidateSearchByIdController::class);
Route::post('/create', CandidateCreateController::class);
Route::post('/delete-by-id', CandidateDeleteByIdController::class);
