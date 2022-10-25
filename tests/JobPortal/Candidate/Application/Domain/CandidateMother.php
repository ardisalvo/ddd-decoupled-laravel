<?php

namespace Tests\JobPortal\Candidate\Application\Domain;

use Illuminate\Http\Request;
use Src\JobPortal\Candidate\Domain\Candidate;

final class CandidateMother
{
    public static function create(
        null|string $id,
        string $firstName,
        string $lastName,
        string $email,
        string $phone
    ): Candidate {
        return new Candidate($id, $firstName, $lastName, $email, $phone);
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


    public static function fromRequest(Request $request): Candidate
    {
        return self::create(
            $request->get('id'),
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email'),
            $request->get('phone')
        );
    }
}
