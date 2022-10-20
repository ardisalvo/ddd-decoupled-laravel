<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Search\ById;

use Src\JobPortal\Company\Application\Search\CompanySearchByIdUseCase;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use \Illuminate\Http\Response;

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
