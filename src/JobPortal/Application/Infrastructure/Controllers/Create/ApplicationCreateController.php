<?php

namespace Src\JobPortal\Application\Infrastructure\Controllers\Create;

use Illuminate\Http\Response;
use Src\JobPortal\Application\Application\Create\ApplicationCreateRequest;
use Src\JobPortal\Application\Application\Create\ApplicationCreateUseCase;

final class ApplicationCreateController
{
    private ApplicationCreateUseCase $useCase;

    public function __construct(ApplicationCreateUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(ApplicationCreateRequestValidation $request): Response
    {
        $request = new ApplicationCreateRequest($request);

        return $this->useCase->__invoke($request);
    }
}
