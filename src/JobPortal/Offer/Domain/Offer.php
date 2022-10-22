<?php

namespace Src\JobPortal\Offer\Domain;

use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferDescription;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferStatus;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferTitle;

final class Offer
{
    private OfferId $id;
    private OfferTitle $title;
    private OfferDescription $description;
    private CompanyId $companyId;
    private OfferStatus $status;

    public function __construct(
        OfferId $id,
        OfferTitle $title,
        OfferDescription $description,
        CompanyId $companyId,
        OfferStatus $status
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->companyId = $companyId;
        $this->status = $status;
    }

    public function id(): OfferId
    {
        return $this->id;
    }

    public function title(): OfferTitle
    {
        return $this->title;
    }

    public function description(): OfferDescription
    {
        return $this->description;
    }

    public function companyId(): CompanyId
    {
        return $this->companyId;
    }

    public function status(): OfferStatus
    {
        return $this->status;
    }
}
