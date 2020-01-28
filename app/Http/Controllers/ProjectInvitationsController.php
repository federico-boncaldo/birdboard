<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;

class ProjectInvitationsController extends Controller
{
    public function store(Project $project)
    {
    	request()->validate([
    		'email' => 'exists:users,email'
    	], [
    		'email.exists' => 'The user you are inviting must have a Birdboard account.'
    	]);

    	$user = User::whereEmail(request('email'))->first();

    	$project->invite($user);
    }
}
