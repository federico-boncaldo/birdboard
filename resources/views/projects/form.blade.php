		<div class="field mb-6">
			<label class="label text-sm mb-2 block" for="title">Project Title</label>

			<div class="control">
				<div>
					<input
						type="text"
						name="title"
						placeholder="Add a title"
						value="{{ $project->title}}"
						class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full"
						required
						>
				</div>
			</div>
		</div>

		<div class="field mb-6">
			<label class="label text-sm mb-2 block" for="title">Project Description</label>

			<div class="control">
				<div>
					<textarea
						name="description"
						placeholder="Add a description"
						class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
						required
					>{{ $project->description }}</textarea>
				</div>
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link mr-2">{{ $buttonText }}</button>
				<a href="{{ $project->path() }}">Cancel</a>
			</div>
		</div>

		@if($errors->any())
			<div class="field mt-6">
				@foreach($errors->all() as $error)
					<li class="text-sm text-red">{{ $error }}</li>
				@endforeach
			</div>
		@endif