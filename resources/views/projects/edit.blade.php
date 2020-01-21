@extends('layouts.app')

@section('content')
	<div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
		<h1>Edit Your Project</h1>
		<form method="POST" action="{{ $project->path() }}">
			@csrf
			@method('PATCH')

			@include('projects.form', [
				'buttonText' => 'Update Project'
			])
		</form>
	</div>
@endsection