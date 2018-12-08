@extends ('layouts.master')

@section ('content')
<div class="col-md-9">

    <div class="blog_left single_left post_show">
        <div class="post-head">
                <h2 class="head"><a href="/posts/{{ strtolower($post->id) }}">{{ $post->title }}</a></h2>
                <h3 class="info">Posted {{ $post->created_at->diffForHumans() }} in <a href="/categories/{{ $post->category->name }}">{{ $post->category->name }}</a> By <a href="/users/{{ $post->user->nickname }}">{{ $post->user->nickname }}</a>.</h3>
                <div class="btn-post">
                    @if (Auth::check() && Auth::user() == $post->user()->first())
                        <a id="btn-tooltip" title="Delete post" href="#"><i data-dialog="somedialog"  class="fas fa-trash-alt trigger"></i></a>
                        <a id="btn-tooltip" title="Edit post" href="/posts/{{ $post->id }}/edit"><i class="fas fa-edit"></i></a>
                    @endif
                </div>
        </div>

        <div class="post_content post-body">
            {!! 
                str_replace('<img', '<img class="img-responsive" style="max-width: 100%"', Markdown::convertToHtml(
                    e($post->body)
                ))
            !!}
        </div>

        @include ('post.tags')

        <div id="dialogEffects" class="sally">
            <div id="somedialog" class="dialog">
                <div class="dialog__overlay"></div>
                <div class="dialog__content">
                    <h2><strong>Do you really want to delete this post?</h2>
                    <div><button class="action" ><a href="/posts/{{ $post->id }}/delete">Yes</a></button>
                    <button class="action" data-dialog-close="">Close</button></div>
                </div>
            </div>
        </div>
        
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