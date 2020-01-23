<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
    	'project_id',
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
}
