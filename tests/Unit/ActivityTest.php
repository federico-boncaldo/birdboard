<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Project;
use App\User;
use Facades\	Tests\Setup\ProjectFactory;

class ActivityTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function it_has_a_user()
	{
		$user = $this->signIn();

		$project = ProjectFactory::ownedBy($user)->create();

		$this->assertEquals($user->id, $project->activity->first()->user->id);
	}
}
