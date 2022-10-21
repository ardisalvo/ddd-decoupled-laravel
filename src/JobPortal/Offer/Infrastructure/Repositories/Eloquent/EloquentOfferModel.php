<?php

namespace Src\JobPortal\Offer\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentOfferModel extends Model
{
    protected $table = 'offers';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'title',
        'description',
        'company_id',
        'status',
    ];
}
