<?php

namespace Tests\JobPortal\Candidate\Application\Domain;

use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;
use Tests\_Shared\Domain\MotherCreator;

final class CandidateEmailMother
{
    public static function create(CandidateEmail $value): CandidateEmail
    {
        return $value;
    }

    public static function random(): CandidateEmail
    {
        return self::create(
            new CandidateEmail(MotherCreator::random()->unique()->safeEmail())
        );
    }
}
