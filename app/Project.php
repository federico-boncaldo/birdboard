<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use RecordsActivity;

    protected $fillable = [
        'title',
        'description',
        'notes',
        'owner_id'
    ];

    protected static $recordableEvents = ['created', 'updated'];

    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Add tasks to the project
     * @param array $tasks
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function addTasks($tasks)
    {
        return $this->tasks()->createMany($tasks);
    }

    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function invite(User $user)
    {
        return $this->members()->attach($user);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members')->withTimestamps();
    }
}
