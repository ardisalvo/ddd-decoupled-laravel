<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Search\ById;

use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\Company\Application\Search\CompanySearchByIdUseCase;

final class CompanySearchByIdController
{
    private CompanySearchByIdUseCase $useCase;

    public function __construct(CompanySearchByIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CompanySearchByIdRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new CompanyId($request->get('id')));
    }
}
