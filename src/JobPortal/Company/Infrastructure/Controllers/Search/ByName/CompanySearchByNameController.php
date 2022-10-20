<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Search\ByName;

use Src\JobPortal\Company\Application\Search\CompanySearchByNameUseCase;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use \Illuminate\Http\Response;

final class CompanySearchByNameController
{

    private CompanySearchByNameUseCase $useCase;

    public function __construct(CompanySearchByNameUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CompanySearchByNameRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new CompanyName($request->get('name')));
    }
}
