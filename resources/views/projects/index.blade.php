@extends('layouts.app')

@section('content')
	<div class="flex items-center mb-3">
		<a href="/projects/create">New Project</a>
	</div>


	<div class="flex">
		@forelse ($projects as $project)
			<div class="bg-white mr-4 rounded shadow w-1/4 p-5">
				<h3 class="font-normal text-xl mb-6 py-4">{{ $project->title }}</h3>
				<div class="text-grey">{{ Str::limit($project->description) }}</div>
			</div>
		@empty
			<div>No projects yet.</div>
		@endforelse
	</div>

@endsection