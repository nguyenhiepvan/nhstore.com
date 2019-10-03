<?php

namespace nhstore\homework;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('nhstore\User')->withDefault();
    }
}
