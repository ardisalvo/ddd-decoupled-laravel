<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Delete;

use Src\JobPortal\Candidate\Application\Delete\CandidateDeleteByIdUseCase;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;
use \Illuminate\Http\Response;

final class CandidateDeleteByIdController
{

    private CandidateDeleteByIdUseCase $useCase;

    public function __construct(CandidateDeleteByIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CandidateDeleteByIdRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new CandidateId($request->get('id')));
    }
}
