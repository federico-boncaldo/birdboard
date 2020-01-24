<?php

namespace App;

use Illuminate\Support\Arr;

trait RecordsActivity
{
	/**
	 * Model old attributes
	 * @var array
	 */
    public $old = [];

    /**
     * Create a new activity
     * @param  string $description activity description
     */
    public function recordActivity(string $description)
    {
        $this->activity()->create([
            'description' => $description,
            'changes' => $this->activityChanges($description),
            'project_id' => class_basename($this) === 'Project' ? $this->id : $this->project_id
        ]);
    }

    /**
     * The activity feed for the model
     * @return Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
     * Fetch the changes to the model
     * @param  string $description
     * @return array|null
     */
    public function activityChanges(string $description)
    {
        if($this->wasChanged()) {
            return [
                    'before' => Arr::except(array_diff($this->old, $this->getAttributes()), ['updated_at']),
                    'after' => Arr::except($this->getChanges(), ['updated_at'])
                ];
        }

    }
}
