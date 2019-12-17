<!DOCTYPE html>
<html>
<head>
	<title>Birdboard</title>
</head>
<body>
	<h1>Birdboard</h1>

	<div>
		<ul>
			@forelse($projects as $project)
				<li>
					<a href="{{ $project->path() }}">
						{{ $project->title }}
					</a>
				</li>
			@empty
				<li>No projects yet.</li>
			@endforelse
		</ul>
	</div>
</body>
</html>