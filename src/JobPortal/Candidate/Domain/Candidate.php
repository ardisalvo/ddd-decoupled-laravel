<?php

namespace Src\JobPortal\Candidate\Domain;

use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateFirstName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateLastName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidatePhone;
use Src\Shared\Domain\ValueObject\Uuid;

final class Candidate
{


    private string|null|CandidateId $id;
    private string|CandidateFirstName $firstName;
    private string|CandidateLastName $lastName;
    private string|CandidateEmail $email;
    private string|CandidatePhone $phone;

    public function __construct(
        string|null $id,
        string $firstName,
        string $lastName,
        string $email,
        string $phone
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;


        $this->fromPrimitives();
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

    public function fromPrimitives(): void
    {
        $id = ($this->id !== null) ? $this->id : Uuid::random()->value();

        $this->id = new CandidateId($id);
        $this->firstName = new CandidateFirstName($this->firstName);
        $this->lastName = new CandidateLastName($this->lastName);
        $this->email = new CandidateEmail($this->email);
        $this->phone = new CandidatePhone($this->phone);
    }
}
