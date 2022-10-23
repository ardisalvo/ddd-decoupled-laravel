<?php

namespace Tests\JobPortal\Offer\Application\Domain;

use Src\JobPortal\Offer\Domain\ValueObjects\OfferDescription;
use Tests\Shared\Domain\MotherCreator;

final class OfferDescriptionMother
{
    public static function create(OfferDescription $value): OfferDescription
    {
        return $value;
    }

    public static function random(): OfferDescription
    {
        return self::create(
            new OfferDescription(MotherCreator::random()->realText())
        );
    }
}
