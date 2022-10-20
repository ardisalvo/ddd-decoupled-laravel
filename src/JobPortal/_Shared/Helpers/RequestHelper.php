<?php

namespace Src\JobPortal\_Shared\Helpers;

trait RequestHelper
{
    public function formatErrorRequestValidations(array $validators): string
    {
        $validationsMessage = [];

        foreach($validators as $validator) {
            $validationsMessage[] = $validator;
        }

        return json_encode($validationsMessage);
    }
}

