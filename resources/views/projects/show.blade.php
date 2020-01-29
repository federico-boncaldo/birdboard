@extends('layouts.app')

@section('content')
	<header class="flex items-center mb-3 pb-4">
		<div class="flex justify-between items-end w-full">
			<p class="text-grey text-sm font-normal">
				<a href="/projects" class="text-grey text-sm font-normal no-underline hover:underline">My Projects</a> / {{ $project->title }}</p>

			<div class="flex items-center">
				@foreach($project->members as $member)
					<img
						src="{{ gravatar_url($member->email) }}"
						alt="{{ $member->name }}'s avatar"
						class="rounded-full w-8 mr-2">
				@endforeach
				<img
					src="{{ gravatar_url($project->owner->email) }}"
					alt="{{ $project->owner->name }}'s avatar"
					class="rounded-full w-8 mr-2">
				<a href="{{ $project->path() . '/edit' }}" class="button ml-4">Edit Project</a>
			</div>
		</div>
	</header>

	<main class="lg:flex -m-x-3">
		<div class="lg:w-3/4 px-3 mb-8">
			<div class="mb-6">
				<h2 class="text-lg text-grey mb-3 text-sm font-normal text-lg">Tasks</h2>
				@foreach ($project->tasks as $task)
					<div class="card mb-3">
						<form method="POST" action="{{ $task->path() }}">
							@method('PATCH')
							@csrf
							<div class="flex">
								<input class="w-full {{ $task->completed ? 'text-grey' : '' }}" name="body" value="{{ $task->body }}">
								<input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
							</div>
						</form>
					</div>
				@endforeach

				<div class="card mb-3">
					<form method="POST" action="{{ $project->path() . '/tasks'}}" >
						@csrf
						<input class="w-full" placeholder="Add a new task..." name="body">
					</form>
				</div>

				{{-- <div class="card">Lorem ipsum.</div> --}}
			</div>

			<div>
				<h2 class="text-lg text-grey mb-3 text-sm font-normal">General Notes</h2>
				{{-- general notes --}}
				<form method="POST" action="{{ $project->path() }}">
					@csrf
					@method('PATCH')

					<textarea
						name="notes"
						class="card w-full mb-4"
						style="min-height: 200px"
						placeholder="Anything special that you want to make a note of?"
					>{{ $project->notes }}</textarea>

					<button type="submit" class="button">Save</button>
				</form>

				@include('errors')
			</div>
		</div>

		<div class="lg:w-1/4 px-3 lg:py-8">
			@include('projects.card')
			@include('projects.activity.card')
			@can('manage', $project)
				@include('projects.invite')
			@endcan
		</div>

	</main>

@endsection