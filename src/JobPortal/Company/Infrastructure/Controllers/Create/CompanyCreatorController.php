<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Create;

use Src\JobPortal\Company\Application\Create\CompanyCreatorUseCase;

final class CompanyCreatorController
{
    private $useCase;

    public function __construct(CompanyCreatorUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CreateCompanyRequest $request)
    {
        $this->useCase->__invoke($request);
    }
}
