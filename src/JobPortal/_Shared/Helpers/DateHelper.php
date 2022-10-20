<?php

namespace Src\JobPortal\_Shared\Helpers;

use Carbon\Carbon;

trait DateHelper
{
    public function getNowTimeString(): string
    {
        return Carbon::now()->toDateTimeString();
    }
}
