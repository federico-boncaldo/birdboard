<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<ul>
			@foreach($projects as $project)
				<li>
					{{ $project->title }}
				</li>
			@endforeach
		</ul>
	</div>
</body>
</html>