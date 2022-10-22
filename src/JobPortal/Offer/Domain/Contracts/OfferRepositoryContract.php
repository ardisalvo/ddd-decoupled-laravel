<?php

namespace Src\JobPortal\Offer\Domain\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Offer\Domain\Offer;
use Src\JobPortal\Offer\Infrastructure\Repositories\Eloquent\EloquentOfferModel;

interface OfferRepositoryContract
{
    public function create(Offer $offer): OfferId|null;

    public function searchById(OfferId $id): ?EloquentOfferModel;

    public function searchByCompanyId(CompanyId $name): ?Collection;

    public function deleteById(OfferId $id): int;

    public function count(): int;

    public function getAll(): ?Collection;
}
