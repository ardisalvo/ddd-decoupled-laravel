<?php

namespace Tests\JobPortal\Candidate\Application\Domain;

use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Application\Create\CandidateCreateRequest;
use Src\JobPortal\Candidate\Domain\Candidate;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateFirstName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateLastName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidatePhone;

final class CandidateMother
{
    public static function create(
        CandidateId $id,
        CandidateFirstName $firstName,
        CandidateLastName $lastName,
        CandidateEmail $email,
        CandidatePhone $phone
    ): Candidate {
        return new Candidate($id, $firstName, $lastName, $email, $phone);
    }

    public static function fromRequest(CandidateCreateRequest $request): Candidate
    {
        return self::create(
            CandidateIdMother::create($request->id()),
            CandidateFirstNameMother::create($request->firstName()),
            CandidateLastNameMother::create($request->lastName()),
            CandidateEmailMother::create($request->email()),
            CandidatePhoneMother::create($request->phone())
        );
    }

    public static function random(): Candidate
    {
        return self::create(
            CandidateIdMother::random(),
            CandidateFirstNameMother::random(),
            CandidateLastNameMother::random(),
            CandidateEmailMother::random(),
            CandidatePhoneMother::random()
        );
    }
}
