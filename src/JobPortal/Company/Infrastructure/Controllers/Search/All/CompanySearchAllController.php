<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Search\All;

use Src\JobPortal\Company\Application\Search\CompanySearchAllUseCase;
use \Illuminate\Http\Response;

final class CompanySearchAllController
{

    private CompanySearchAllUseCase $useCase;

    public function __construct(CompanySearchAllUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(): Response
    {
        return $this->useCase->__invoke();
    }
}
