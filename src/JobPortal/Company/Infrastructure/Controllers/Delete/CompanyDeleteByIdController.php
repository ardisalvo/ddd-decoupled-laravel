<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Delete;

use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\Company\Application\Delete\CompanyDeleteByIdUseCase;

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
