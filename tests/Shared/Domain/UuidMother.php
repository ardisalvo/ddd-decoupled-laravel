<?php

namespace Tests\Shared\Domain;

final class UuidMother
{
    public static function random(): string
    {
        return MotherCreator::random()->unique()->uuid;
    }
}
