<?php

namespace Src\JobPortal\Application\Infrastructure\Controllers\Search\ById;

use Illuminate\Http\Response;
use Src\JobPortal\Application\Application\Search\ApplicationSearchByIdUseCase;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationId;

final class ApplicationSearchByIdController
{
    private ApplicationSearchByIdUseCase $useCase;

    public function __construct(ApplicationSearchByIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(ApplicationSearchByIdRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new ApplicationId($request->get('id')));
    }
}
