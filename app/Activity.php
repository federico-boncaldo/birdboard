<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
    	'project_id',
        'user_id',
    	'description',
    	'changes'
    ];

    protected $casts = [
    	'changes' => 'array'
    ];

    public function subject()
    {
    	return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
