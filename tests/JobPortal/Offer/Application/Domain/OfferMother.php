<?php

namespace Tests\JobPortal\Offer\Application\Domain;

use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Application\Create\CandidateCreateRequest;
use Src\JobPortal\Candidate\Domain\Candidate;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateFirstName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateLastName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidatePhone;

final class OfferMother
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
            OfferIdMother::create($request->id()),
            OfferDescriptionMother::create($request->firstName()),
            OfferTitleMother::create($request->lastName()),
            CandidateEmailMother::create($request->email()),
            OfferStatusMother::create($request->phone())
        );
    }

    public static function random(): Candidate
    {
        return self::create(
            OfferIdMother::random(),
            OfferDescriptionMother::random(),
            OfferTitleMother::random(),
            CandidateEmailMother::random(),
            OfferStatusMother::random()
        );
    }
}
