<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Create;

use Illuminate\Http\Response;
use Src\JobPortal\Company\Application\Create\CompanyCreateRequest;
use Src\JobPortal\Company\Application\Create\CompanyCreateUseCase;

final class CompanyCreateController
{
    private CompanyCreateUseCase $useCase;

    public function __construct(CompanyCreateUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CompanyCreateRequestValidation $request): Response
    {
        $request = new CompanyCreateRequest($request);

        return $this->useCase->__invoke($request);
    }
}
