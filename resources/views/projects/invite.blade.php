<div class="card flex flex-col mt-3">
	<h3 class="font-normal text-xl mb-6 py-4 -ml-5 border-l-4 border-blue-light pl-4 mb-3">
		Invite a User
	</h3>

	<form method="POST" action="{{ $project->path() . '/invitations' }}" >
		@csrf

		<div class="mb-3">
			<input type="email" name="email" placeholder="Email address" class="border border-grey rounder w-full py-2 px-3">
		</div>

		<button type="submit" class="button">Invite</button>
	</form>

	@include('errors', ['bag' => 'invitations'])

</div>