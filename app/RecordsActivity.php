<?php

namespace App;

use Illuminate\Support\Arr;

trait RecordsActivity
{
    /**
     * The model's old attributes
     * @var array
     */
    public $oldAttributes = [];

    /**
     * Boot the trait
     */
    public static function bootRecordsActivity()
    {
        foreach (self::recordableEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($model->activityDescription($event));
            });

            if($event === 'updated') {
		        static::updating(function ($model) {
		            $model->oldAttributes = $model->getOriginal();
		        });
            }
        }
    }

    protected function activityDescription(string $description)
    {
        return "{$description}_" . strtolower(class_basename($this));
    }

    protected static function recordableEvents()
    {
        if (isset(static::$recordableEvents)) {
            return static::$recordableEvents;
        }

		return ['created', 'updated'];

    }

    /**
     * Create a new activity
     * @param  string $description activity description
     */
    public function recordActivity(string $description)
    {
        $this->activity()->create([
            'user_id' => ($this->project ?? $this)->owner->id,
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
        if ($this->wasChanged()) {
            return [
                    'before' => Arr::except(array_diff($this->oldAttributes, $this->getAttributes()), ['updated_at']),
                    'after' => Arr::except($this->getChanges(), ['updated_at'])
                ];
        }
    }
}
