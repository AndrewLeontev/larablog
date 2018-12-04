@extends ('layouts.master')

@section ('content')

	<div class="col-md-9">

		@include('layouts.pagination')


		@include ('layouts.post')

		<div class="mx-auto">
				@include('layouts.pagination')
		</div>
		

	</div>  
@endsection