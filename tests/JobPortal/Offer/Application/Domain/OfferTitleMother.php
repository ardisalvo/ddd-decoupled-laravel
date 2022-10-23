<?php

namespace Tests\JobPortal\Offer\Application\Domain;

use Src\JobPortal\Offer\Domain\ValueObjects\OfferTitle;
use Tests\_Shared\Domain\MotherCreator;

final class OfferTitleMother
{
    public static function create(OfferTitle $value): OfferTitle
    {
        return $value;
    }

    public static function random(): OfferTitle
    {
        return self::create(
            new OfferTitle(MotherCreator::random()->jobTitle())
        );
    }
}
