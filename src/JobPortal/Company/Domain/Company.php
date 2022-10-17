<?php

namespace Src\JobPortal\Company\Domain;

use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Src\JobPortal\Company\Domain\ValueObjects\CompanySector;

final class Company
{
    private $id;
    private $name;
    private $sector;

    public function __construct(CompanyId $id, CompanyName $name, CompanySector $sector)
    {
        $this->id = $id;
        $this->name = $name;
        $this->sector = $sector;
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
}
