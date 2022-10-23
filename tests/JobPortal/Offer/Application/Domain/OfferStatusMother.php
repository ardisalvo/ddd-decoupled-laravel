<?php

namespace Tests\JobPortal\Offer\Application\Domain;

use Src\JobPortal\Offer\Domain\ValueObjects\OfferStatus;
use Tests\Shared\Domain\RandomElementPicker;

final class OfferStatusMother
{
    public static function create(OfferStatus $value): OfferStatus
    {
        return $value;
    }

    public static function random(): OfferStatus
    {
        return self::create(
            new OfferStatus(
                RandomElementPicker::from(0, 1)
            )
        );
    }
}
