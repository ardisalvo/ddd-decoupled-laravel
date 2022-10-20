<?php

namespace Src\JobPortal\Candidate\Domain;

use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateFirstName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateFullName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateLastName;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidatePhone;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateTimeStamp;

final class Candidate
{

    private CandidateId $candidateId;
    private CandidateEmail $candidateEmail;
    private CandidateFirstName $candidateFirstName;
    private CandidateLastName $candidateLastName;
    private CandidatePhone $candidatePhone;
    private CandidateTimeStamp $candidateTimeStamp;
    private CandidateFullName $candidateFullName;


    public function __construct(
        CandidateId $candidateId,
        CandidateEmail $candidateEmail,
        CandidateFirstName $candidateFirstName,
        CandidateLastName $candidateLastName,
        CandidatePhone $candidatePhone,
        CandidateTimeStamp $candidateTimeStamp,
    ) {
        $this->candidateId = $candidateId;
        $this->candidateEmail = $candidateEmail;
        $this->candidateFirstName = $candidateFirstName;
        $this->candidateLastName = $candidateLastName;
        $this->candidatePhone = $candidatePhone;
        $this->candidateTimeStamp = $candidateTimeStamp;
    }

    public function candidateId(): CandidateId
    {
        return $this->candidateId;
    }

    public function candidateEmail(): CandidateEmail
    {
        return $this->candidateEmail;
    }

    public function candidateFirstName(): CandidateFirstName
    {
        return $this->candidateFirstName;
    }

    public function candidateFullName(): CandidateFullName
    {
        return $this->candidateFullName;
    }

    public function candidateLastName(): CandidateLastName
    {
        return $this->candidateLastName;
    }

    public function candidatePhone(): CandidatePhone
    {
        return $this->candidatePhone;
    }

    public function candidateTimeStamp(): CandidateTimeStamp
    {
        return $this->candidateTimeStamp;
    }
}
