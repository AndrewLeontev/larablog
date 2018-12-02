@extends ('layouts.master')

@section ('content')
<div class="col-md-9">

    <div class="blog_left single_left post_show">
        <h2>{{ $post->title }}</h2>
        <h3>Posted {{ $post->created_at->diffForHumans() }} in <a href="/categories/{{ $post->category_id }}">{{ $post->category->name }}</a> By <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>.</h3>
        
        <div class="post_content">{!! Markdown::convertToHtml($post->body) !!}</div>
        
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