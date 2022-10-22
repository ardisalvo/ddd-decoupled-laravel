<?php

namespace Src\JobPortal\Application\Infrastructure\Controllers\Search\All;

use Illuminate\Http\Response;
use Src\JobPortal\Application\Application\Search\ApplicationSearchAllUseCase;

final class ApplicationSearchAllController
{
    private ApplicationSearchAllUseCase $useCase;

    public function __construct(ApplicationSearchAllUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(): Response
    {
        return $this->useCase->__invoke();
    }
}
