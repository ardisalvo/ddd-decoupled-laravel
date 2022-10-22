<?php

namespace Src\JobPortal\Offer\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Offer\Domain\Contracts\OfferRepositoryContract;
use Src\JobPortal\Offer\Domain\Offer;

class EloquentOfferRepository implements OfferRepositoryContract
{
    public function create(Offer $offer): OfferId|null
    {
        $result = EloquentOfferModel::create([
            'id' => $offer->id()->value(),
            'title' => $offer->title()->value(),
            'description' => $offer->description()->value(),
            'company_id' => $offer->companyId()->value(),
            'status' => $offer->status()->value(),
        ]);

        if ($result) {
            return new OfferId($result->id);
        }

        return null;
    }

    public function searchById(OfferId $id): ?EloquentOfferModel
    {
        return EloquentOfferModel::where('id', $id)->first();
    }

    public function count(): int
    {
        return EloquentOfferModel::count();
    }

    public function getAll(): ?Collection
    {
        return EloquentOfferModel::orderBy('created_at', 'DESC')->get();
    }

    public function searchByCompanyId(CompanyId $companyId): ?Collection
    {
        return EloquentOfferModel::where('company_id', $companyId)->get();
    }

    public function deleteById(OfferId $id): int
    {
        return EloquentOfferModel::where('id', $id)->delete();
    }
}
