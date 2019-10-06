<?php

namespace nhstore;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
      protected $fillable = [
        'name', 'acronym', 'slug','user_id','parent_id'
    ];
}
