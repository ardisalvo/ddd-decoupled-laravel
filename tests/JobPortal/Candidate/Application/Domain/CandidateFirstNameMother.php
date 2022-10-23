<?php

namespace Tests\JobPortal\Candidate\Application\Domain;

use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateFirstName;
use Tests\_Shared\Domain\MotherCreator;

final class CandidateFirstNameMother
{
    public static function create(CandidateFirstName $value): CandidateFirstName
    {
        return $value;
    }

    public static function random(): CandidateFirstName
    {
        return self::create(
            new CandidateFirstName(MotherCreator::random()->firstName())
        );
    }
}
