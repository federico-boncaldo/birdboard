@extends('layout')

@section('content')
	<h1>Create a New Project</h1>
	<form method="POST" action="/projects">
		@csrf

		<div>
			<input type="text" name="title" placeholder="Project Title" value="{{ old('title') }}">
		</div>
		<div>
			<textarea name="description" placeholder="Project Description" >{{ old('description') }}</textarea>
		</div>

		<button type="submit">Create Project</button>

	</form>
@endsection