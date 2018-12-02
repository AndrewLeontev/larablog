@extends ('layouts.master')

@section ('content')

	<div class="col-md-9">

		@include('layouts.pagination')


		@if (count($posts))
			@foreach ($posts as $post)
				<div class="blog_left post_show post_index">
					<h2><a href="/posts/{{ strtolower($post->id) }}">{{ $post->title }}</a></h2>
					<h3>Posted {{ $post->created_at->diffForHumans() }} in <a href="/categories/{{ $post->category_id }}">{{ $post->category->name }}</a> By <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>.</h3>
					<div class="post-body">{!! Markdown::convertToHtml(substr(e($post->body), 0, 250)) !!}</div>
					<h3>Comments: <a href="/posts/{{ strtolower($post->id) }}#comments">{{ count($post->comments) }}</a></h3>
					
					@include ('post.tags')
					
				</div>
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