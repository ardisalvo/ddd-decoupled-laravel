<?php

namespace Tests\Shared\Domain;

final class WordMother
{
    public static function random(): string
    {
        return MotherCreator::random()->word;
    }
}
