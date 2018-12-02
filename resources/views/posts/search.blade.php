@extends ('layouts.master')

@section ('content')
	<div class="col-md-9">
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
		
		{{-- @include('layouts.pagination') --}}


		<hr>
		@if (count($posts))
			@foreach ($posts as $post)
				<div class="blog_left">
					{{-- <a href="single.html" class="mask"><img src="/images/blog.jpg" alt="image" class="img-responsive zoom-img"></a> --}}
				
					<h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
					<h3>Posted {{ $post->created_at }} in <a href="/categories/{{ $post->category_id }}">{{ $post->category->name }}</a> By <a href="#">Admin</a>.</h3>
					<div><p>{{ substr($post->body, 0, 250) }}</p></div>

					@include ('post.tags')

				</div>
				<hr style="border: 1px solid darkgray">	
				<br>	
			@endforeach  
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