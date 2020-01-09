@extends('layouts.app')

@section('content')
	<h1>Create a New Project</h1>
	<form method="POST" action="/projects">
		@csrf

		<div class="field">
			<label class="label" for="title">Project Title</label>
			<div>
				<input type="text" name="title" placeholder="Project Title" value="{{ old('title') }}">
			</div>
		</div>

		<div class="field">
			<label class="label" for="title">Project Description</label>
			<div>
				<textarea name="description" placeholder="Project Description" >{{ old('description') }}</textarea>
			</div>
		</div>

		<button type="submit">Create Project</button>
		<a href="/projects">Cancel</a>

	</form>
@endsection