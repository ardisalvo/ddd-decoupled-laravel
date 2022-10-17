<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain;

use Tests\Shared\Domain\MotherCreator;

final class RandomElementPicker
{
    public static function from(...$elements)
    {
        return MotherCreator::random()->randomElement($elements);
    }
}
