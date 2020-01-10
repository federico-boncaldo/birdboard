<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = [
		'body'
	];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
