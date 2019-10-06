<?php

namespace nhstore;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable = [
        'name', 'acronym', 'slug','user_id',
    ];
}
