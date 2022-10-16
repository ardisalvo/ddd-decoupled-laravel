<?php

namespace Src\JobPortal\Candidate\Domain\Requests\Create;

class CandidateCreateRequest
{
    private array|null $value;
    private string $date;

    /**
     * @param  array|null  $value
     * @param  string  $date
     */
    public function __construct(array $value, string $date)
    {
        $this->value = $value;
        $this->date = $date;
    }

    /**
     * @return array|null
     */
    public function value(): ?array
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function date(): string
    {
        return $this->date;
    }

    public function handler(): array
    {
        return array_merge($this->value, [
            'created_at' => $this->date(),
            'updated_at' => $this->date(),
        ]);

    }
}