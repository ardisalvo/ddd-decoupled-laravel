<?php

namespace Src\JobPortal\Application\Application\Search;

use Illuminate\Http\Response;
use Src\JobPortal\Application\Domain\Contracts\ApplicationRepositoryContract;
use Src\JobPortal\Application\Domain\Exceptions\ApplicationException;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationId;

class ApplicationSearchByIdUseCase
{
    private ApplicationRepositoryContract $repository;

    public function __construct(ApplicationRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ApplicationId $id): Response
    {
        $response = $this->repository->searchById($id);

        if (! $response) {
            $this->exception();
        }

        return response([
            'message' => 'Offer found:',
            'data' => $response->toArray(),
        ], 200);
    }

    private function exception(): void
    {
        throw new ApplicationException("There are no applications in the database.", 500);
    }
}
