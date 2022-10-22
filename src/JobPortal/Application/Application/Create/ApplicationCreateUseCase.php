<?php

namespace Src\JobPortal\Application\Application\Create;

use Illuminate\Http\Response;
use Src\JobPortal\Application\Domain\Contracts\ApplicationRepositoryContract;
use Src\JobPortal\Application\Domain\Exceptions\ApplicationException;
use Src\JobPortal\Application\Domain\Application;

class ApplicationCreateUseCase
{
    private ApplicationRepositoryContract $repository;

    public function __construct(ApplicationRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ApplicationCreateRequest $request): Response
    {
        $offer = new Application(
            $request->id(),
            $request->offerId(),
            $request->candidateId(),
            $request->annotations(),
            $request->status(),
        );

        $response = $this->repository->create($offer);

        if (! $response) {
            $this->exception();
        }

        return response([
            'message' => 'Offer successfully created.',
            'id' => $response->value(),
        ], 200);
    }

    private function exception(): void
    {
        throw new ApplicationException("Offer cant be created", 500);
    }
}
