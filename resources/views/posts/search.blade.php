@extends ('layouts.master')

@section ('content')
	<div class="col-md-9 col-sm-12">
		<h2>Search results for: </h2>
		<div class="search col-md-5">
				<form method="GET" action="/search">
						@csrf
					<input type="text" name="search" id="search" value="{{ $searchstr }}" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
					<input type="submit" value="">
				</form>
				
		</div>
		<div class="clearfix"> </div>
		<div class="alert alert-primary" role="alert">Find {{ count($posts) }} results</div>

		<hr>

		@if (count($posts))
		<section class="posts-blocks">
			<div class="blog_left post_show post_index">
				<div class="row">
					@foreach ($posts as $post)
						@include ('layouts.post')
					@endforeach  
				</div>
			</div>
		</section>  
		@else 
			<div class="log_left">
				<h2>
					There are no posts yet
				</h2>
			</div>
		@endif

		@include('layouts.pagination')
		
	</div> 

@endsection