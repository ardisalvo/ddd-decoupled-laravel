<?php

namespace Src\JobPortal\Application\Domain;

use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationAnnotations;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationId;
use Src\JobPortal\Application\Domain\ValueObjects\ApplicationStatus;

final class Application
{
    private ApplicationId $id;
    private OfferId $offerId;
    private CandidateId $candidateId;
    private ApplicationAnnotations $annotations;
    private ApplicationStatus $status;

    public function __construct(
        ApplicationId $id,
        OfferId $offerId,
        CandidateId $candidateId,
        ApplicationAnnotations $annotations,
        ApplicationStatus $status
    ) {
        $this->id = $id;
        $this->offerId = $offerId;
        $this->candidateId = $candidateId;
        $this->annotations = $annotations;
        $this->status = $status;
    }

    public function id(): ApplicationId
    {
        return $this->id;
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

    public function status(): ApplicationStatus
    {
        return $this->status;
    }
}
