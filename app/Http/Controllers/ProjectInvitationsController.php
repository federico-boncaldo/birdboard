<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;

class ProjectInvitationsController extends Controller
{
    public function store(Project $project)
    {
    	$user = User::whereEmail(request('email'))->first();

    	$project->invite($user);
    }
}
