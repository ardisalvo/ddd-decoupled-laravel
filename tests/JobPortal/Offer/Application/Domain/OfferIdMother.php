<?php

namespace Tests\JobPortal\Offer\Application\Domain;

use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Tests\Shared\Domain\UuidMother;

final class OfferIdMother
{
    public static function create(CandidateId $value): CandidateId
    {
        return $value;
    }

    public static function random(): CandidateId
    {
        return self::create(
            new CandidateId(
                UuidMother::random()
            )
        );
    }
}
