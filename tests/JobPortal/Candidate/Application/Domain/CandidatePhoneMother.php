<?php

namespace Tests\JobPortal\Candidate\Application\Domain;

use Src\JobPortal\Candidate\Domain\ValueObjects\CandidatePhone;
use Tests\_Shared\Domain\MotherCreator;

final class CandidatePhoneMother
{
    public static function create(CandidatePhone $value): CandidatePhone
    {
        return $value;
    }

    public static function random(): CandidatePhone
    {
        return self::create(
            new CandidatePhone(
                MotherCreator::random()->e164PhoneNumber()
            )
        );
    }
}
