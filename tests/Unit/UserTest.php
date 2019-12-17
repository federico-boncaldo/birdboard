<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function a_user_has_projects()
	{
		$user = factory(User::class)->create();

		$this->assertInstanceOf(Collection::class, $user->projects);
	}
}
