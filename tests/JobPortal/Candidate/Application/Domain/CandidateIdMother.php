<?php

namespace Tests\JobPortal\Candidate\Application\Domain;

use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Tests\_Shared\Domain\UuidMother;

final class CandidateIdMother
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
