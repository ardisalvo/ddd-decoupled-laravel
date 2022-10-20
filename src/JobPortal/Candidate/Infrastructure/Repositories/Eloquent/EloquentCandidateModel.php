<?php

namespace Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentCandidateModel extends Model
{
    protected $table = 'candidates';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'phone',
        'email',
    ];
}
