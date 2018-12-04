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
                            @if (Auth::check() && Auth::user() == $post->user()->first())
                                <a id="btn-tooltip" title="Delete post" href="#"><i data-dialog="somedialog"  class="fas fa-trash-alt trigger"></i></a>
                                <a id="btn-tooltip" title="Edit post" href="/posts/{{ $post->id }}/edit"><i class="fas fa-edit"></i></a>
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