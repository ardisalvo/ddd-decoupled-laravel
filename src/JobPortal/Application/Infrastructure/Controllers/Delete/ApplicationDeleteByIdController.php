<?php

namespace Src\JobPortal\Application\Infrastructure\Controllers\Delete;

use Illuminate\Http\Response;
use Src\JobPortal\Application\Application\Delete\ApplicationDeleteByIdUseCase;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationId;

final class ApplicationDeleteByIdController
{
    private ApplicationDeleteByIdUseCase $useCase;

    public function __construct(ApplicationDeleteByIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(ApplicationDeleteByIdRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new ApplicationId($request->get('id')));
    }
}
