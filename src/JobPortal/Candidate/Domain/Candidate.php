<?php

namespace Src\JobPortal\Candidate\Domain;

use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateFirstName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateLastName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidatePhone;

final class Candidate
{
    private CandidateId $id;
    private CandidateFirstName $firstName;
    private CandidateLastName $lastName;
    private CandidateEmail $email;
    private CandidatePhone $phone;


    public function __construct(
        CandidateId $id,
        CandidateFirstName $firstName,
        CandidateLastName $lastName,
        CandidateEmail $email,
        CandidatePhone $phone
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function id(): CandidateId
    {
        return $this->id;
    }

    public function getId(): CandidateId
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
