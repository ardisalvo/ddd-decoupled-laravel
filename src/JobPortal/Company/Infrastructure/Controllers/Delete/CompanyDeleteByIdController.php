<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Delete;

use Src\JobPortal\Company\Application\Delete\CompanyDeleteByIdUseCase;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use \Illuminate\Http\Response;

final class CompanyDeleteByIdController
{

    private CompanyDeleteByIdUseCase $useCase;

    public function __construct(CompanyDeleteByIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CompanyDeleteByIdRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new CompanyId($request->get('id')));
    }
}
