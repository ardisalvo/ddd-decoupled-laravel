<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Search;

use Src\JobPortal\Company\Application\Search\CompanySearchByIdUseCase;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;

final class CompanySearchByIdController
{

    private CompanySearchByIdUseCase $useCase;

    public function __construct(CompanySearchByIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CompanySearchByIdRequestValidation $request)
    {
        return $this->useCase->__invoke(new CompanyId($request->get('id')));
    }
}
