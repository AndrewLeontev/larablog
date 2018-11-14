@extends ('test.layouts.master')

@section ('content')
	<div class="col-md-9">
		@foreach ($posts as $post)
			<div class="blog_left">
				{{-- <a href="single.html" class="mask"><img src="/images/blog.jpg" alt="image" class="img-responsive zoom-img"></a> --}}
			
				<h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
				<h3>Posted {{ $post->created_at }} in {{ $post->categories }} By <a href="#">Admin</a>.</h3>
				<p>{{ $post->body }}</p>
			</div>
			<hr style="border: 1px solid darkgray">		
		@endforeach  

		<ul class="dc_pagination dc_paginationA dc_paginationA06">
				<li class="prev"> </li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">...</a></li>
				<li><a href="#">19</a></li>
				<li class="next"> </li>
				<div class="clearfix"> </div>
		</ul>
	</div>  
@endsection