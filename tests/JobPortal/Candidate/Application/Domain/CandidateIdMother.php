<?php

namespace Tests\JobPortal\Candidate\Application\Domain;

use Tests\_Shared\Domain\UuidMother;

final class CandidateIdMother
{
    public static function create(string $value): string
    {
        return $value;
    }

    public static function random(): string
    {
        return self::create(UuidMother::random());
    }
}
