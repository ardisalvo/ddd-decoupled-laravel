<?php

namespace Tests\JobPortal\Candidate\Application\Domain;

use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateLastName;
use Tests\_Shared\Domain\MotherCreator;

final class CandidateLastNameMother
{
    public static function create(CandidateLastName $value): CandidateLastName
    {
        return $value;
    }

    public static function random(): CandidateLastName
    {
        return self::create(
            new CandidateLastName(MotherCreator::random()->lastName())
        );
    }
}
