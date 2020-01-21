<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Project;
use Illuminate\Support\Str;
use Tests\Setup\ProjectFactory;

class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_manage_a_project()
    {
        $project = factory(Project::class)->create();

        $this->get('/projects/create')->assertRedirect('login');
        $this->post('/projects', $project->toArray())->assertRedirect('login');

        $this->get('/projects')->assertRedirect('login');
        $this->get($project->path() . '/edit')->assertRedirect('login');

        $this->get($project->path())->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->signIn();

        $this->get('/projects/create')->assertStatus(200);

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'notes' => 'General notes here.'
        ];

        $response = $this->post('/projects', $attributes);

        $project = Project::where($attributes)->first();

        $response->assertRedirect($project->path());

        $this->assertDatabaseHas('projects', $attributes);

        $this->get($project->path())
            ->assertSee($attributes['title'])
            ->assertSee(Str::limit($attributes['description']))
            ->assertSee($attributes['notes']);
    }

    /** @test */
    public function a_user_can_update_a_project()
    {
        $project = app(ProjectFactory::class)
            ->ownedBy($this->signIn())
            ->create();

        $this->get($project->path() . '/edit')->assertOk();

        $attributes = [
            'title' => 'Changed',
            'description' => 'Changed',
            'notes' => 'Changed'
        ];

        $this->patch($project->path(), $attributes)
            ->assertRedirect($project->path());


        $this->assertDatabaseHas('projects', $attributes);

    }

    /** @test */
    public function a_user_can_update_a_project_general_notes()
    {
        $project = app(ProjectFactory::class)
            ->ownedBy($this->signIn())
            ->create();

        $attributes = [
            'notes' => 'Changed'
        ];

        $this->patch($project->path(), $attributes)
            ->assertRedirect($project->path());

        $this->assertDatabaseHas('projects', $attributes);

    }

    /** @test */
    public function a_user_can_view_their_projects()
    {
        $project = app(ProjectFactory::class)
            ->ownedBy($this->signIn())
            ->create();

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /** @test */
    public function an_authenticated_user_cannot_view_the_projects_of_others()
    {
        $this->be(factory(User::class)->create());

        $project = factory(Project::class)->create();

        $this->get($project->path())->assertStatus(403);
    }

    /** @test */
    public function an_authenticated_user_cannot_update_the_projects_of_others()
    {
        $this->be(factory(User::class)->create());

        $project = factory(Project::class)->create();

        $this->patch($project->path())->assertStatus(403);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $this->signIn();

        $attributes = factory(Project::class)->raw(['title' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $this->signIn();

        $attributes = factory(Project::class)->raw(['description' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }
}
