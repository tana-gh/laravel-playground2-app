<?php

namespace App\DataProvider\Database;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = false;

    protected $guarded = [
        'id'
    ];
}
