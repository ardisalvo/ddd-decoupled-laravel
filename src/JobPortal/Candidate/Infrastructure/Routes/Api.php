<?php

namespace Src\JobPortal\Candidate\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Search\CandidateSearchAllController;

Route::get('/', function () {
    dd('Welcome to JobPortal Project DDD.');
});

Route::get('/search/all', CandidateSearchAllController::class);

