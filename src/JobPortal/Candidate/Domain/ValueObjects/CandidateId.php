<?php

namespace Src\JobPortal\Candidate\Domain\ValueObjects;

final class CandidateId
{
    /**
     * @var int
     */
    private $value;

    /**
     * @param  int  $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }
}
