<?php

namespace Src\JobPortal\Candidate\Domain\ValueObjects;

final class CandidateFirstName
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param  string  $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
