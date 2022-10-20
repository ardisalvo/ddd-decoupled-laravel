<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Search\All;

use Src\JobPortal\Company\Application\Search\CompanySearchAllUseCase;

final class CompanySearchAllController
{

    private CompanySearchAllUseCase $useCase;

    public function __construct(CompanySearchAllUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    /**
     * @return array
     */
    public function __invoke()
    {
        return $this->useCase->__invoke();
    }
}
