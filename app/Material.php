<?php

namespace nhstore;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $fillable = [
        'name', 'acronym', 'slug','user_id',
    ];
}
