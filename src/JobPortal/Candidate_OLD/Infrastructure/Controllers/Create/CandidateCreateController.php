<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Create;

use Src\JobPortal\Candidate\Application\Create\CandidateCreateUseCase;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Infrastructure\RequestValidations\CandidateCreateRequestValidation;
use Src\JobPortal\_Shared\Helpers\DateHelper;

final class CandidateCreateController
{
    use DateHelper;

    private $createUseCase;

    public function __construct(CandidateCreateUseCase $createUseCase)
    {
        $this->createUseCase = $createUseCase;
    }

    public function __invoke(CandidateCreateRequestValidation $request): array
    {
        return $this->createUseCase->__invoke($request->all(), $this->getNowTimeString());
    }
}
