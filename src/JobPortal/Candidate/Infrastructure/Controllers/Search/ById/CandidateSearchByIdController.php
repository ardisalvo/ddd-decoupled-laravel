<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Search\ById;

use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Application\Search\CandidateSearchByIdUseCase;

final class CandidateSearchByIdController
{
    private CandidateSearchByIdUseCase $useCase;

    public function __construct(CandidateSearchByIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CandidateSearchByIdRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new CandidateId($request->get('id')));
    }
}
