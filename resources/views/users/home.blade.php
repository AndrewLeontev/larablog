@extends ('layouts.master')

@section ('content')

	<div class="col-md-9">
            @if (Auth::check())
                <h3>Hello, {{ Auth::user()->name}}!</h3>
                <a class="btn btn-info" href="/posts/create">Create new post</a>
                
                <div class="clearfix"></div>

                <h3 class="myposts">My posts: </h3>
                @if (count($posts))
                    @foreach ($posts as $post)
                        <div class="blog_left post_show post_index">
                            <h2><a href="/posts/{{ strtolower($post->id) }}">{{ $post->title }}</a></h2>
                            <h3>Posted {{ $post->created_at->diffForHumans() }} in <a href="/categories/{{ $post->category_id }}">{{ $post->category->name }}</a> By <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>.</h3>
                            <div><p>{{ substr($post->body, 0, 250) }}</p></div>
                            <h3>Comments: <a href="/posts/{{ strtolower($post->id) }}#comments">{{ count($post->comments) }}</a></h3>
                        </div>
                    @endforeach  
                @else 
                    <div class="log_left">
                        <h2>
                        There are no posts yet
                        </h2>
                    </div>
                @endif
            @else
                <h4>You don't have permissions</h4>
            @endif
    </div>
@endsection