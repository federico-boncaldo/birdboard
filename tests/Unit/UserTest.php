<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Facades\Tests\Setup\ProjectFactory;

class UserTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function a_user_has_projects()
	{
		$user = factory(User::class)->create();

		$this->assertInstanceOf(Collection::class, $user->projects);
	}

	/** @test */
	public function a_user_has_accessible_projects()
	{
		$john = $this->signIn();

		$project = ProjectFactory::ownedBy($john)->create();

		$this->assertCount(1, $john->accessibleProjects());

		$sally = factory(User::class)->create();
		$nick = factory(User::class)->create();

		$project = tap(ProjectFactory::ownedBy($sally)->create())->invite($nick);

		$this->assertCount(1, $john->accessibleProjects());

		$project->invite($john);

		$this->assertCount(2, $john->accessibleProjects());
	}
}
