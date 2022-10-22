<?php

namespace Src\JobPortal\Application\Application\Delete;

use Illuminate\Http\Response;
use Src\JobPortal\Application\Domain\Contracts\ApplicationRepositoryContract;
use Src\JobPortal\Application\Domain\Exceptions\ApplicationException;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationId;

class ApplicationDeleteByIdUseCase
{
    private ApplicationRepositoryContract $repository;

    public function __construct(ApplicationRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ApplicationId $id): Response
    {
        $response = $this->repository->deleteById($id);

        if (! $response) {
            $this->exception();
        }

        return response([
            'message' => 'Offer deleted',
            'data' => $id->value(),
        ], 200);
    }

    private function exception(): void
    {
        throw new ApplicationException(
            "The application could not be deleted. Please verify that the ID is correct and that the application exists.",
            500
        );
    }
}
