<?php

namespace Src\JobPortal\Application\Application\Search;

use Illuminate\Http\Response;
use Src\JobPortal\Application\Domain\Contracts\ApplicationRepositoryContract;
use Src\JobPortal\Application\Domain\Exceptions\ApplicationException;

class ApplicationSearchAllUseCase
{
    private ApplicationRepositoryContract $repository;

    public function __construct(ApplicationRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): Response
    {
        $response = $this->repository->getAll();

        if (! $response) {
            $this->exception();
        }

        return response([
            'message' => 'List of applications:',
            'data' => $response,
        ], 200);
    }

    private function exception(): void
    {
        throw new ApplicationException("There are no applications in the database.", 500);
    }
}
