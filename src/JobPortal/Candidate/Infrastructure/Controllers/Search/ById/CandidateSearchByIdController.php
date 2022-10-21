<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Search\ById;

use Src\JobPortal\Candidate\Application\Search\CandidateSearchByIdUseCase;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;
use \Illuminate\Http\Response;

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
