<?php

declare(strict_types=1);

namespace Tests\JobPortal\Company\Application\Domain;

use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Tests\Shared\Domain\WordMother;

final class CompanyNameMother
{
    public static function create(string $value): CompanyName
    {
        return new CompanyName($value);
    }

    public static function random(): CompanyName
    {
        return self::create(WordMother::random());
    }
}
