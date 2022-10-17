<?php

namespace Src\JobPortal\Candidate\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Create\CandidateCreateController;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Delete\CandidateDeleteByIdController;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Search\CandidateSearchAllController;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Update\CandidateUpdateController;

Route::get('/', function () {
    dd('Welcome to JobPortal Project DDD.');
});

Route::get('/search/all', CandidateSearchAllController::class);
Route::post('/delete-by-id', CandidateDeleteByIdController::class);
Route::post('/create', CandidateCreateController::class);
Route::post('/update', CandidateUpdateController::class);

