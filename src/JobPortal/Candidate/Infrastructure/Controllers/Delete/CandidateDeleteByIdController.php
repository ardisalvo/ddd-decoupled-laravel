<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Delete;

use Src\JobPortal\Candidate\Application\Delete\CandidateDeleteByIdUseCase;
use Illuminate\Http\Request;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;

final class CandidateDeleteByIdController
{

    private $deleteByIdUseCase;

    public function __construct(CandidateDeleteByIdUseCase $deleteByIdUseCase)
    {
        $this->deleteByIdUseCase = $deleteByIdUseCase;
    }

    public function __invoke(Request $request)
    {

        $candidateId = $request->get('candidateId');
        $candidateId = new CandidateId($candidateId);

        $this->deleteByIdUseCase->__invoke($candidateId);
    }
}
