<?php

namespace Tests\JobPortal\Offer\Application\Domain;

use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Offer\Application\Create\OfferCreateRequest;
use Src\JobPortal\Offer\Domain\Offer;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferDescription;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferStatus;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferTitle;
use Tests\Shared\Domain\Company\CompanyIdMother;

final class OfferMother
{
    public static function create(
        OfferId $id,
        OfferTitle $title,
        OfferDescription $description,
        OfferStatus $status,
        CompanyId $companyId
    ): Offer {
        return new Offer($id, $title, $description, $companyId, $status);
    }

    public static function fromRequest(OfferCreateRequest $request): Offer
    {
        return self::create(
            OfferIdMother::create($request->id()),
            OfferTitleMother::create($request->title()),
            OfferDescriptionMother::create($request->description()),
            OfferStatusMother::create($request->status()),
            CompanyIdMother::create($request->companyId())
        );
    }

    public static function random(CompanyId $companyIdMother): Offer
    {
        return self::create(
            OfferIdMother::random(),
            OfferTitleMother::random(),
            OfferDescriptionMother::random(),
            OfferStatusMother::random(),
            $companyIdMother
        );
    }
}
