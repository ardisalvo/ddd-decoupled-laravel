<?php

namespace Src\JobPortal\Application\Domain\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Application\Domain\Application;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationId;
use Src\JobPortal\Application\Infrastructure\Repositories\Eloquent\EloquentApplicationModel;

interface ApplicationRepositoryContract
{
    public function create(Application $offer): ApplicationId|null;

    public function searchById(ApplicationId $id): ?EloquentApplicationModel;

    public function searchByCandidateId(CandidateId $candidateId): ?Collection;

    public function searchByOfferId(OfferId $offerId): ?Collection;

    public function deleteById(ApplicationId $id): int;

    public function count(): int;

    public function getAll(): ?Collection;
}
