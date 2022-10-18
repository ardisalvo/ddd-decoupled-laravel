<?php

namespace Src\JobPortal\Company\Application\Create;

use Illuminate\Http\Request;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Src\JobPortal\Company\Domain\ValueObjects\CompanySector;
use Src\Shared\Domain\ValueObject\Uuid;

final class CompanyCreatorRequest
{
    private CompanyId $id;
    private CompanyName $name;
    private CompanySector $duration;

    public function __construct(Request $request)
    {
        $requestId = $request->get('id') ? : Uuid::random()->value();

        $this->id = new CompanyId($requestId);
        $this->name = new CompanyName($request->get('name'));
        $this->duration = new CompanySector($request->get('duration'));
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function duration(): string
    {
        return $this->duration;
    }
}
