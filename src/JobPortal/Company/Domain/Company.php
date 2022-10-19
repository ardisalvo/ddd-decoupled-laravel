<?php

namespace Src\JobPortal\Company\Domain;

use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Src\JobPortal\Company\Domain\ValueObjects\CompanySector;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyStatus;

final class Company
{
    private CompanyId $id;
    private CompanyName $name;
    private CompanySector $sector;
    private CompanyStatus $status;

    public function __construct(CompanyId $id, CompanyName $name, CompanySector $sector, CompanyStatus $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->sector = $sector;
        $this->status = $status;
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
