<?php

declare(strict_types = 1);

namespace Src\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}
