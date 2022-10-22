<?php

namespace Src\JobPortal\Application\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Application\Domain\Contracts\ApplicationRepositoryContract;
use Src\JobPortal\Application\Domain\Application;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationId;

class EloquentApplicationRepository implements ApplicationRepositoryContract
{
    public function create(Application $offer): ApplicationId|null
    {
        $result = EloquentApplicationModel::create([
            'id' => $offer->id()->value(),
            'offer_id' => $offer->offerId()->value(),
            'candidate_id' => $offer->candidateId()->value(),
            'annotations' => $offer->annotations()->value(),
            'status' => $offer->status()->value(),
        ]);

        if ($result) {
            return new ApplicationId($result->id);
        }

        return null;
    }

    public function searchById(ApplicationId $id): ?EloquentApplicationModel
    {
        return EloquentApplicationModel::where('id', $id)->first();
    }

    public function count(): int
    {
        return EloquentApplicationModel::count();
    }

    public function getAll(): ?Collection
    {
        return EloquentApplicationModel::orderBy('created_at', 'DESC')->orderBy('created_at', 'DESC')->get();
    }

    public function searchByCandidateId(CandidateId $candidateId): ?Collection
    {
        return EloquentApplicationModel::where('candidate_id', $candidateId)->orderBy('created_at', 'DESC')->get();
    }

    public function searchByOfferId(OfferId $offerId): ?Collection
    {
        return EloquentApplicationModel::where('offer_id', $offerId)->orderBy('created_at', 'DESC')->get();
    }

    public function deleteById(ApplicationId $id): int
    {
        return EloquentApplicationModel::where('id', $id)->delete();
    }
}
