<?php

namespace Src\JobPortal\Candidate\Domain\ValueObjects;

final class CandidateFullName
{
    /**
     * @var array
     */
    private $value;

    /**
     * @param  array  $value
     */
    public function __construct(array $value)
    {
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function value(): array
    {
        return $this->value;
    }

    public function firstName(): string
    {
        return $this->value['first_name'];
    }

    public function lastName(): string
    {
        return $this->value['first_name'];
    }

    public function fullName(): string
    {
        return $this->firstName().' '.$this->lastName();
    }
}
