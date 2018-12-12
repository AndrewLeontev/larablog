@extends ('layouts.master')

@section ('content')

	<div class="col-md-9">

		@include('layouts.pagination')

		@if (count($posts))
			@foreach ($posts as $post)
				@include ('layouts.post')
				@endforeach  
		@else 
          <div class="log_left">
              <h2>
                There are no posts yet
              </h2>
          </div>
		@endif


		<div class="mx-auto">
				@include('layouts.pagination')
		</div>
		

	</div>  
@endsection