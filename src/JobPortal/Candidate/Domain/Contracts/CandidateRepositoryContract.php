<?php

namespace Src\JobPortal\Candidate\Domain\Contracts;

interface CandidateRepositoryContract
{
    public function findAll(): array;
}
