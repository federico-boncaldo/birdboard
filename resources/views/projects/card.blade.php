<div class="card">
	<h3 class="font-normal text-xl mb-6 py-4 -ml-5 border-l-4 border-blue-light pl-4 mb-3">
		<a href="{{ $project->path() }}">{{ $project->title }}</a>
	</h3>
	<div class="text-grey mb-4">{{ Str::limit($project->description) }}</div>

	<footer>
		<form method="POST" action="{{ $project->path() }}" class="text-right">
			@method('DELETE')
			@csrf
			<button type="submit" class="text-xs">Delete</button>
		</form>
	</footer>
</div>