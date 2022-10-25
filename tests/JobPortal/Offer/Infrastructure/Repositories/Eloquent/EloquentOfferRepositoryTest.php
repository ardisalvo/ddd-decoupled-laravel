<?php

namespace Tests\JobPortal\Offer\Infrastructure\Repositories\Eloquent;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Src\JobPortal\Company\Application\Create\CompanyCreateRequest;
use Src\JobPortal\Company\Infrastructure\Controllers\Create\CompanyCreateRequestValidation;
use Src\JobPortal\Company\Infrastructure\Controllers\Delete\CompanyDeleteByIdRequestValidation;
use Src\JobPortal\Company\Infrastructure\Controllers\Search\ById\CompanySearchByIdRequestValidation;
use Src\JobPortal\Company\Infrastructure\Repositories\Eloquent\EloquentCompanyRepository;
use Src\JobPortal\Offer\Application\Create\OfferCreateRequest;
use Src\JobPortal\Offer\Infrastructure\Controllers\Create\OfferCreateRequestValidation;
use Src\JobPortal\Offer\Infrastructure\Controllers\Delete\OfferDeleteByIdRequestValidation;
use Src\JobPortal\Offer\Infrastructure\Controllers\Search\ById\OfferSearchByIdRequestValidation;
use Src\JobPortal\Offer\Infrastructure\Repositories\Eloquent\EloquentOfferRepository;
use Tests\JobPortal\Company\Application\Domain\CompanyMother;
use Tests\JobPortal\Company\Application\Domain\CompanyNameMother;
use Tests\JobPortal\Company\Application\Domain\CompanySectorMother;
use Tests\JobPortal\Company\Application\Domain\CompanyStatusMother;
use Tests\JobPortal\Offer\Application\Domain\OfferDescriptionMother;
use Tests\JobPortal\Offer\Application\Domain\OfferIdMother;
use Tests\JobPortal\Offer\Application\Domain\OfferMother;
use Tests\JobPortal\Offer\Application\Domain\OfferStatusMother;
use Tests\JobPortal\Offer\Application\Domain\OfferTitleMother;
use Tests\_Shared\Domain\Company\CompanyIdMother;
use Tests\TestCase;

class EloquentOfferRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private null|Request $request;
    private null|OfferCreateRequestValidation $createRequestValidation;
    private null|OfferSearchByIdRequestValidation $searchByIdRequestValidation;
    private null|OfferDeleteByIdRequestValidation $deleteByIdRequestValidation;
    private null|EloquentOfferRepository $repository;
    private string $staticUuid;

    private null|Request $companyRequest;
    private null|CompanyCreateRequestValidation $companyCreateRequestValidation;
    private null|CompanySearchByIdRequestValidation $companySearchByIdRequestValidation;
    private null|CompanyDeleteByIdRequestValidation $companyDeleteByIdRequestValidation;
    private null|EloquentCompanyRepository $companyRepository;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->request = null;
        $this->createRequestValidation = null;
        $this->searchByIdRequestValidation = null;
        $this->repository = null;
        $this->staticUuid = '49424436-4f25-11ed-bdc3-0242ac120002';

        $this->companyRequest = null;
        $this->companyCreateRequestValidation = null;
        $this->companySearchByIdRequestValidation = null;
        $this->companyRepository = null;
    }


    /** test */
    public function it_should_create_random_company_then_get_uuid_and_create_random_offer(): void
    {
        $this->initializeVariables();

        $companyId = $this->createSingleCompany();

        $this->assertEquals(0, $this->repository->count());

        $this->request->replace([
            'id' => OfferIdMother::random()->value(),
            'title' => OfferTitleMother::random()->value(),
            'description' => OfferDescriptionMother::random()->value(),
            'status' => OfferStatusMother::random()->value(),
            'company_id' => $companyId,
        ]);

        $validation = Validator::make($this->request->all(), $this->createRequestValidation->rules());
        $this->assertFalse($validation->fails());

        $offer = new OfferCreateRequest($this->request);

        $offer = OfferMother::fromRequest($offer);

        $this->repository->create($offer);

        $this->assertEquals(1, $this->repository->count());
    }

    private function createSingleCompany(): string
    {
        $this->initializeCompanyVariables();

        $this->assertEquals(0, $this->companyRepository->count());

        $this->companyRequest->replace([
            'id' => CompanyIdMother::random()->value(),
            'name' => CompanyNameMother::random()->value(),
            'sector' => CompanySectorMother::random()->value(),
            'status' => CompanyStatusMother::random()->value(),
        ]);

        $validation = Validator::make($this->companyRequest->all(), $this->companyCreateRequestValidation->rules());
        $this->assertFalse($validation->fails());

        $company = new CompanyCreateRequest($this->companyRequest);

        $company = CompanyMother::fromRequest($company);

        $this->companyRepository->create($company);

        $this->assertEquals(1, $this->companyRepository->count());

        return $company->id()->value();
    }

    private function initializeVariables()
    {
        $this->request = new Request();
        $this->createRequestValidation = new OfferCreateRequestValidation();
        $this->searchByIdRequestValidation = new OfferSearchByIdRequestValidation();
        $this->deleteByIdRequestValidation = new OfferDeleteByIdRequestValidation();
        $this->repository = new EloquentOfferRepository();
    }

    private function initializeCompanyVariables()
    {
        $this->companyRequest = new Request();
        $this->companyCreateRequestValidation = new CompanyCreateRequestValidation();
        $this->companySearchByIdRequestValidation = new CompanySearchByIdRequestValidation();
        $this->companyDeleteByIdRequestValidation = new CompanyDeleteByIdRequestValidation();
        $this->companyRepository = new EloquentCompanyRepository();
    }
}
