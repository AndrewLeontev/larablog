@extends ('layouts.master')

@section ('content')
<div class="col-md-9">

    <div class="blog_left single_left post_show">
        <h2>{{ $post->title }}</h2>
        <h3>Posted {{ $post->created_at->diffForHumans() }} in <a href="/categories/{{ strtolower($post->categories) }}">{{ strtolower($post->categories) }}</a> By <a href="#">Admin</a>.</h3>
        <div class="post_content">{{ $post->body }}</div>
    </div>

    <div id="comments">
        @include ('comments.show')
    </div>
    
    <div class="clearfix"></div>

    @include ('comments.new')

</div>  
@endsection