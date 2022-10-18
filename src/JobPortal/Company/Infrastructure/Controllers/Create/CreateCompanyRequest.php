<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Create;

use Illuminate\Http\Request;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Src\JobPortal\Company\Domain\ValueObjects\CompanySector;

final class CreateCompanyRequest
{
    private $id;
    private $name;
    private $duration;

    public function __construct(Request $request)
    {
        $this->id = new CompanyId($request->get('id') ?? 0);
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
