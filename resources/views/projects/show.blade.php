@extends('layouts.app')

@section('content')
	<header class="flex items-center mb-3 py-4">
		<div class="flex justify-between items-end w-full">
			<p class="text-grey text-sm font-normal">
				<a href="/projects" class="text-grey text-sm font-normal">My Projects</a> / {{ $project->title }}</p>

			<a href="/projects/create" class="button">New Project</a>
		</div>
	</header>

	<main class="lg:flex -m-x-3">
		<div class="lg:w-3/4 px-3 mb-8">
			<div class="mb-6">
				<h2 class="text-lg text-grey mb-3 text-sm font-normal text-lg">Tasks</h2>
				@foreach ($project->tasks as $task)
					<div class="card mb-3">{{ $task->body }}</div>
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
				<textarea class="card w-full" style="min-height: 200px">Lorem ipsum.</textarea>
			</div>
		</div>

		<div class="lg:w-1/4 px-3">
			@include('projects.card')
		</div>

	</main>

@endsection