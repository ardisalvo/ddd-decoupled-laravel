<?php

namespace Src\JobPortal\Company\Infrastructure\Repositories\Eloquent;

class EloquentCompanyModel extends \App\Models\Company
{
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'sector',
    ];

    public $timestamps = false;
}
