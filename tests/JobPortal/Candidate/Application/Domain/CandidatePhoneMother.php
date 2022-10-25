<?php

namespace Tests\JobPortal\Candidate\Application\Domain;

use Src\JobPortal\Candidate\Domain\ValueObjects\CandidatePhone;
use Tests\_Shared\Domain\MotherCreator;

final class CandidatePhoneMother
{
    public static function create(string $value): string
    {
        return $value;
    }

    public static function random(): string
    {
        return self::create(MotherCreator::random()->e164PhoneNumber());
    }
}
