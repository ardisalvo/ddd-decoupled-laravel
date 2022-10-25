<?php

namespace Tests\JobPortal\Candidate\Application\Create;

use Src\JobPortal\Candidate\Application\Create\CandidateCreateUseCase;
use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Tests\JobPortal\Candidate\Application\Domain\CandidateMother;
use Tests\TestCase;


class CandidateCreateUseCaseUnitTest extends TestCase
{

    /** @test */
    public function it_should_create_a_valid_candidate(): void
    {
        $candidate = CandidateMother::random();

        $candidateRepositoryMock = $this->createMock(CandidateRepositoryContract::class);

        $candidateRepositoryMock->method('create')
            ->willReturn($candidate->id());

        $useCase = new CandidateCreateUseCase($candidateRepositoryMock);

        $response = $useCase->__invoke($candidate);
        $responseContent = json_decode($response->getContent());

        $this->assertEquals('Candidate successfully created.', $responseContent->message);
        $this->assertEquals($candidate->id()->value(), $responseContent->id);
    }
}
