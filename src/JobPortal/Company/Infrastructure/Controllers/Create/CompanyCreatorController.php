<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Create;

use Src\JobPortal\Company\Application\Create\CompanyCreatorRequest;
use Src\JobPortal\Company\Application\Create\CompanyCreatorUseCase;

final class CompanyCreatorController
{
    private CompanyCreatorUseCase $useCase;

    public function __construct(CompanyCreatorUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CompanyCreatorRequestValidation $request)
    {
        $request = new CompanyCreatorRequest($request);

        $this->useCase->__invoke($request);
    }
}
