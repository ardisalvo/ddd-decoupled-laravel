<?php

namespace Src\JobPortal\Company\Infrastructure\Repositories\File;

use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent\Candidate;
use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;

final class FileCompanyRepository implements CompanyRepositoryContract
{
    private const FILE_PATH = __DIR__ . '/files/companies';

    public function create(Company $company): void
    {
        $result = Candidate::create([
            'first_name' => 'A',
            'last_name' => 'B',
            'phone' => '622622622',
            'email' => 'a@a.com',
        ]);

        file_put_contents($this->fileName($company->id()->value()), serialize($company));
    }

    public function searchById(CompanyId $id): ?Company
    {
        return file_exists($this->fileName($id->value()))
            ? unserialize(file_get_contents($this->fileName($id->value())))
            : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }
}
