<?php

namespace Src\JobPortal\Application\Application\Create;

use Illuminate\Http\Request;
use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationAnnotations;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationId;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationStatus;
use Src\Shared\Domain\ValueObject\Uuid;

final class ApplicationCreateRequest
{
    private ApplicationId $id;
    private ApplicationStatus $status;
    private OfferId $offerId;
    private CandidateId $candidateId;
    private ApplicationAnnotations $annotations;

    public function __construct(Request $request)
    {
        $requestId = $request->get('id') ?: Uuid::random()->value();

        $this->id = new ApplicationId($requestId);
        $this->offerId = new OfferId($request->get('offer_id'));
        $this->candidateId = new CandidateId($request->get('candidate_id'));
        $this->annotations = new ApplicationAnnotations($request->get('annotations'));
        $this->status = new ApplicationStatus($request->get('status'));
    }

    public function id(): ApplicationId
    {
        return $this->id;
    }


    public function status(): ApplicationStatus
    {
        return $this->status;
    }

    public function offerId(): OfferId
    {
        return $this->offerId;
    }

    public function candidateId(): CandidateId
    {
        return $this->candidateId;
    }

    public function annotations(): ApplicationAnnotations
    {
        return $this->annotations;
    }
}
