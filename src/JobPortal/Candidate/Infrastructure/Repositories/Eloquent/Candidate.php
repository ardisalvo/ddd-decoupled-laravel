<?php

namespace Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;

final class Candidate extends \App\Models\Candidate
{
    use SoftDeletes;

    protected $table = 'candidates';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
    ];
}
