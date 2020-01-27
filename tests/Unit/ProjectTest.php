<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Project;
use App\User;

class ProjectTest extends TestCase
{
	use RefreshDatabase;

	protected $project;

	/** @test */
	public function it_has_a_path()
	{
		$project = factory(Project::class)->create();

		$this->assertEquals('/projects/' . $project->id, $project->path());
	}

	/** @test */
	public function it_has_a_owner()
	{
		$project = factory(Project::class)->create();

		$this->assertInstanceOf(User::class, $project->owner);
	}

	/** @test */
	public function it_can_add_a_task()
	{
		$project = factory('App\Project')->create();

		$task = $project->addTask('Test task');

		$this->assertCount(1, $project->tasks);
		$this->assertTrue($project->tasks->contains($task));
	}

	/** @test */
	public function it_can_invite_a_user()
	{
		$project = factory(Project::class)->create();

		$project->invite($user = factory(User::class)->create());

		$this->assertTrue($project->members->contains($user));
	}
}
