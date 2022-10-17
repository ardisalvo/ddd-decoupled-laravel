<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Update;

use Src\JobPortal\Candidate\Application\Create\CandidateCreateUseCase;
use Src\JobPortal\Candidate\Application\Update\CandidateUpdateUseCase;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Infrastructure\RequestValidations\CandidateCreateRequestValidation;
use Src\JobPortal\_Shared\Helpers\DateHelper;
use Src\JobPortal\Candidate\Infrastructure\RequestValidations\CandidateUpdateRequestValidation;

final class CandidateUpdateController
{
    use DateHelper;

    private $updateUseCase;

    public function __construct(CandidateUpdateUseCase $updateUseCase)
    {
        $this->updateUseCase = $updateUseCase;
    }

    public function __invoke(CandidateUpdateRequestValidation $request): array
    {
        return $this->updateUseCase->__invoke(
            $request,
            $this->getNowTimeString()
        );
    }
}
