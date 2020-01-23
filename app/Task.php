<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = [
		'body',
		'completed'
	];

	protected $touches = ['project'];

    protected $casts = [
        'completed' => 'boolean'
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    public function path()
    {
    	return '/projects/' . $this->project->id . '/tasks/' . $this->id;
    }

    /**
     * Set the completed value to true for the task
     */
    public function complete()
    {
        $this->update(['completed' => true]);

        $this->project->recordActivity('completed_task');
    }

    /**
     * Set the completed value to true for the task
     */
    public function incomplete()
    {
        $this->update(['completed' => false]);

        $this->project->recordActivity('uncompleted_task');
    }

    public function activity()
    {
        //polymorphic hasMany relationship - anything can trigger and have activities
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
     * Create a new activity
     * @param  string $description activity description
     */
    public function recordActivity(string $description)
    {
        $this->activity()->create([
            'project_id' => $this->project_id,
            'description' => $description
        ]);
    }

}
