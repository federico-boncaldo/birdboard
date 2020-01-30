			<div class="card mt-3">
				<ul class="text-default text-xs list-reset">
					@foreach($project->activity as $activity)
						<li class="{{ $loop->last ? '' : 'mb-1'}}">
							@include("projects.activity.{$activity->description}") <span class="text-default">{{ $activity->created_at->diffForHumans(null, true) }}</span>
						</li>
					@endforeach
				</ul>
			</div>