<?php

namespace Src\JobPortal\_Shared\Domain\Exceptions;

class CustomException extends \Exception
{
    public function toException(): array
    {
        $temporallyClass = new \ReflectionClass(get_class($this));
        $class = explode('\\', $temporallyClass->getName());

        return [
            'status' => $this->getCode(),
            'error' => true,
            'class' => end($class),
            'message' => $this->getMessage(),
        ];
    }
}
