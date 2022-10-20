<?php

namespace Src\JobPortal\Candidate\Domain\ValueObjects;

final class CandidateTimeStamp
{
    /**
     * @var string
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

    public function createdAt(): string
    {
        return $this->value['created_at'];
    }

    public function updatedAt(): string
    {
        return $this->value['updated_at'];
    }
}
