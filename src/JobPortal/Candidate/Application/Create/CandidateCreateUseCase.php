<?php

namespace Src\JobPortal\Candidate\Application\Create;

use Src\JobPortal\Candidate\Domain\Exceptions\CandidateException;
use Src\JobPortal\Candidate\Domain\Candidate;
use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Illuminate\Http\Response;

class CandidateCreateUseCase
{
    private CandidateRepositoryContract $repository;

    public function __construct(CandidateRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CandidateCreateRequest $request): Response
    {

        $candidate = new Candidate(
            $request->id(),
            $request->firstName(),
            $request->lastName(),
            $request->email(),
            $request->phone(),
        );

        $response = $this->repository->create($candidate);

        if (!$response) {
            $this->exception();
        }

        return response([
            'message' => 'Candidate successfully created.',
            'id' => $response->value(),
        ], 200);
    }

    private function exception(): void
    {
        throw new CandidateException("Candidate cant be created", 500);
    }
}
