<?php

namespace App\DataProvider\Database;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    protected $guarded = [
        'id'
    ];
}
