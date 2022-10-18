<?php

namespace Src\JobPortal\Candidate\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Create\CandidateCreateController;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Delete\CandidateDeleteByIdController;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Search\CandidateSearchAllController;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Update\CandidateUpdateController;
use Src\JobPortal\Company\Infrastructure\Controllers\Create\CompanyCreatorController;

Route::get('/', function () {
    dd('Welcome to JobPortal Project DDD. -- Company');
});

Route::get('/search/all', CandidateSearchAllController::class);
Route::post('/create', CompanyCreatorController::class);

