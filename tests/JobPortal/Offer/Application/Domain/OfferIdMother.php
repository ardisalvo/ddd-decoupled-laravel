<?php

namespace Tests\JobPortal\Offer\Application\Domain;

use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Tests\_Shared\Domain\UuidMother;

final class OfferIdMother
{
    public static function create(OfferId $value): OfferId
    {
        return $value;
    }

    public static function random(): OfferId
    {
        return self::create(
            new OfferId(
                UuidMother::random()
            )
        );
    }
}
