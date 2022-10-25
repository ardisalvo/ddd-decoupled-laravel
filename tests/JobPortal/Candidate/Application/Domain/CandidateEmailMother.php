<?php

namespace Tests\JobPortal\Candidate\Application\Domain;

use Tests\_Shared\Domain\MotherCreator;

final class CandidateEmailMother
{
    public static function create(string $value): string
    {
        return $value;
    }

    public static function random(): string
    {
        return self::create(MotherCreator::random()->unique()->safeEmail());
    }
}
