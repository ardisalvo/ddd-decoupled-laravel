<?php

namespace Tests\JobPortal\Candidate\Application\Domain;

use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateLastName;
use Tests\_Shared\Domain\MotherCreator;

final class CandidateLastNameMother
{
    public static function create(string $value): string
    {
        return $value;
    }

    public static function random(): string
    {
        return self::create(MotherCreator::random()->lastName());
    }
}
