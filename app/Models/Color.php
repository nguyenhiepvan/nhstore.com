<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $fillable = [
        'name', 'acronym', 'slug','user_id',
    ];
}
