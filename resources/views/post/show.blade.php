@extends ('layouts.master')

@section ('content')
<div class="col-md-9">

    <div class="blog_left single_left post_show">
        <div class="post-head">
                <h2 class="head"><a href="/posts/{{ strtolower($post->id) }}">{{ $post->title }}</a></h2>
                <h3 class="info">Posted {{ $post->created_at->diffForHumans() }} in <a href="/categories/{{ $post->category->name }}">{{ $post->category->name }}</a> By <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>.</h3>
                <div class="btn-post">
                    @if (Auth::check() && Auth::user()->get() == $post->user()->get())
                        <a href="/posts/{{ $post->id }}/delete"><i class="fas fa-trash-alt"></i></a>
                    @endif
                </div>
        </div>
        {{-- <div class="post_content post-body">{!! Markdown::convertToHtml(e($post->body)) !!}</div> --}}
        <div class="post_content post-body">
            {!! 
                str_replace('<img', '<img class="img-responsive" style="max-width: 100%"', Markdown::convertToHtml(
                    substr(e($post->body), 0, 250)
                ))
            !!}
        </div>
        @include ('post.tags')
        
    </div>

    <div id="comments">
        
        @include ('comments.show')
        
    </div>
    
    <div class="clearfix"></div>

    @if (Auth::check())
        @include ('comments.new')
    @else 
        <div class="unauth">
            <h4>For replies <a href="/login">login</a> or <a href="/register">register</a>.</h4>
        </div>
    @endif    

</div>  
@endsection