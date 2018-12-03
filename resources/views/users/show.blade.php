@extends ('layouts.master')
@section ('content')

<div class="col-md-9">
    <h3>All posts by: {{ $user->name }}</h3>
    @if (count($posts))
        @foreach ($posts as $post)
            <div class="blog_left post_show post_index">
                <div class="post-head">
                        <h2 class="head"><a href="/posts/{{ strtolower($post->id) }}">{{ $post->title }}</a></h2>
                        <h3 class="info">Posted {{ $post->created_at->diffForHumans() }} in <a href="/categories/{{ $post->category->name }}">{{ $post->category->name }}</a> By <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>.</h3>
                        <div class="btn-post">
                            @if (Auth::check() && Auth::user()->get() == $post->user()->get())
                                <a id="btn-tooltip" title="Delete post" href="/posts/{{ $post->id }}/delete"><i class="fas fa-trash-alt"></i></a>                                            
                            @endif
                        </div>
                </div>
                <div class="post_content post-body">
                    {!! 
                        str_replace('<img', '<img class="img-responsive" style="max-width: 100%"', Markdown::convertToHtml(
                            substr(e($post->body), 0, 250)
                        ))
                    !!}
                </div>
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
</div>

@endsection