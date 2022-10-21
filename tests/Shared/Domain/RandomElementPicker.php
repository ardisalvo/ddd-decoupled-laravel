<?php

namespace Tests\Shared\Domain;

final class RandomElementPicker
{
    public static function from(...$elements)
    {
        return MotherCreator::random()->randomElement($elements);
    }
}
