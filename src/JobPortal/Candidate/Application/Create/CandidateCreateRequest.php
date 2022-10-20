<?php

namespace Src\JobPortal\Candidate\Application\Create;

use Illuminate\Http\Request;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateFirstName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateLastName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidatePhone;
use Src\Shared\Domain\ValueObject\Uuid;

final class CandidateCreateRequest
{
    private CandidateId $id;
    private CandidateFirstName $firstName;
    private CandidateLastName $lastName;
    private CandidateEmail $email;
    private CandidatePhone $phone;

    public function __construct(Request $request)
    {
        $requestId = $request->get('id') ?: Uuid::random()->value();

        $this->id = new CandidateId($requestId);
        $this->firstName = new CandidateFirstName($request->get('first_name'));
        $this->lastName = new CandidateLastName($request->get('last_name'));
        $this->email = new CandidateEmail($request->get('email'));
        $this->phone = new CandidatePhone($request->get('phone'));
    }

    public function id(): CandidateId
    {
        return $this->id;
    }

    public function firstName(): CandidateFirstName
    {
        return $this->firstName;
    }

    public function lastName(): CandidateLastName
    {
        return $this->lastName;
    }

    public function email(): CandidateEmail
    {
        return $this->email;
    }

    public function phone(): CandidatePhone
    {
        return $this->phone;
    }
}
