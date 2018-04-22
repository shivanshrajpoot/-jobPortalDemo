<div class="card border-secondary w-80 mb-4">
	<div class="card-body">
		<h5 class="card-title text-secondary">{{$job->title}}</h5>
		<p class="card-text">{{$job->description}}</p>
		@auth
			@if($job->applied_id != auth()->user()->id)
				<button class="btn btn-success" data-target="{{base64_encode($job->id)}}" data-url="{{url('/apply-for-job')}}" data-ajax="apply">Apply</button>
			@else
				<button class="btn btn-danger" disabled>Applied</button>
			@endif
		@else
			<a class="btn btn-info" href="{{url('/login')}}">Login To Apply</a>
		@endauth
	</div>
</div>