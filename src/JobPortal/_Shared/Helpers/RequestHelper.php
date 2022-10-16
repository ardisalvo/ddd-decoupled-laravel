<?php

namespace Src\JobPortal\_Shared\Helpers;

trait RequestHelper
{
    public function formatErrorRequestValidations(array $validators): string
    {
        $message = "\n=============\n";

        array_walk($validators, function ($value) use (&$message) {
            $message .= "=> ".$value."\n";
        });

        $message .= "============\n";

        return $message;
    }
}

