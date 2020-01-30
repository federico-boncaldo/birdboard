<div class="card flex flex-col">
	<h3 class="font-normal text-default text-xl mb-6 py-4 -ml-5 border-l-4 border-blue-light pl-4 mb-3">
		<a href="{{ $project->path() }}">{{ $project->title }}</a>
	</h3>
	<div class="text-default mb-4 flex-1">{{ Str::limit($project->description) }}</div>

	@can ('manage', $project)
		<footer>
			<form method="POST" action="{{ $project->path() }}" class="text-right">
				@method('DELETE')
				@csrf
				<button type="submit" class="text-xs">Delete</button>
			</form>
		</footer>
	@endcan
</div>