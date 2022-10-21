<?php

namespace Src\JobPortal\Company\Application\Create;

use Illuminate\Http\Request;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Src\JobPortal\Company\Domain\ValueObjects\CompanySector;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyStatus;
use Src\Shared\Domain\ValueObject\Uuid;

final class CompanyCreateRequest
{
    private CompanyId $id;
    private CompanyName $name;
    private CompanySector $sector;
    private CompanyStatus $status;

    public function __construct(Request $request)
    {
        $requestId = $request->get('id') ?: Uuid::random()->value();

        $this->id = new CompanyId($requestId);
        $this->name = new CompanyName($request->get('name'));
        $this->sector = new CompanySector($request->get('sector'));
        $this->status = new CompanyStatus($request->get('status'));
    }

    public function id(): CompanyId
    {
        return $this->id;
    }

    public function name(): CompanyName
    {
        return $this->name;
    }

    public function sector(): CompanySector
    {
        return $this->sector;
    }

    public function status(): CompanyStatus
    {
        return $this->status;
    }
}
