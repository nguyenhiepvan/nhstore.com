<?php

namespace nhstore\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'acronym', 'slug','user_id',
    ];
}
