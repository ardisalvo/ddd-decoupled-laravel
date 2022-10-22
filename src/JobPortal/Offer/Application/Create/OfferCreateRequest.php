<?php

namespace Src\JobPortal\Offer\Application\Create;

use Illuminate\Http\Request;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferDescription;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferStatus;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferTitle;
use Src\Shared\Domain\ValueObject\Uuid;

final class OfferCreateRequest
{
    private OfferId $id;
    private OfferDescription $description;
    private OfferStatus $status;
    private OfferTitle $title;
    private CompanyId $company_id;

    public function __construct(Request $request)
    {
        $requestId = $request->get('id') ?: Uuid::random()->value();

        $this->id = new OfferId($requestId);
        $this->description = new OfferDescription($request->get('description'));
        $this->status = new OfferStatus($request->get('status'));
        $this->title = new OfferTitle($request->get('title'));
        $this->company_id = new CompanyId($request->get('company_id'));
    }

    public function id(): OfferId
    {
        return $this->id;
    }

    public function description(): OfferDescription
    {
        return $this->description;
    }

    public function status(): OfferStatus
    {
        return $this->status;
    }

    public function title(): OfferTitle
    {
        return $this->title;
    }

    public function companyId(): CompanyId
    {
        return $this->company_id;
    }
}
