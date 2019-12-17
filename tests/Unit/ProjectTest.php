<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Project;

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
}
