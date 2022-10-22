<?php

namespace Src\JobPortal\Application\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentApplicationModel extends Model
{
    protected $table = 'applications';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'offer_id',
        'candidate_id',
        'annotations',
        'status',
    ];
}
