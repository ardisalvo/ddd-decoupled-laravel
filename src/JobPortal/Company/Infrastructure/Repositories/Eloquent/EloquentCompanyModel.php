<?php

namespace Src\JobPortal\Company\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentCompanyModel extends Model
{
    protected $table = 'companies';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'sector',
        'status',
    ];
}
