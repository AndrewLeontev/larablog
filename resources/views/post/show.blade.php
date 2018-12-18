@extends ('layouts.master')

@section ('content')
<div class="col-md-9 col-sm-12">

    {{-- <div class="blog_left single_left post_show">
        <div class="row">
            <div class="post-img col-sm-3">
                    <div class="post-poster" >
                            <img src="/uploads/posts/{{ $post->post_image }}" alt="" class="image-responsive">
                    </div>
            </div>
            <div class="post-head col-sm-9">
                    <h2 class="head"><a href="/posts/{{ strtolower($post->slug) }}">{{ $post->title }}</a></h2>
                    <h3 class="info">Posted {{ $post->created_at->diffForHumans() }} in <a href="/categories/{{ $post->category->name }}">{{ $post->category->name }}</a> By <a href="/users/{{ $post->user->nickname }}">{{ $post->user->nickname }}</a>.</h3>
                    <div class="btn-post">
                        @if (Auth::check() && Auth::user() == $post->user()->first())
                            <a id="btn-tooltip" title="Delete post" href="#"><i data-dialog="somedialog"  class="fas fa-trash-alt trigger"></i></a>
                            <a id="btn-tooltip" title="Edit post" href="/posts/{{ $post->slug }}/edit"><i class="fas fa-edit"></i></a>
                        @endif
                    </div>
            </div>
            


            <div class="post_content  col-sm-12 post-body" style="padding: 20px 20px;">
                {!! 
                    str_replace('<img', '<img class="img-responsive" style="max-width: 100%"', Markdown::convertToHtml(
                        e($post->body)
                    ))
                !!}
            </div>

            <div class="col-sm-12">
                    @include ('post.tags')
            </div>
        </div>

        </div> --}}

        <div class="post-block single-post wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="post-holder">
                    <div class="img-holder">
                        <img style="max-width: 720px; max-height: 435px;" src="/uploads/posts/{{ $post->post_image }}" alt="post image">
                    </div>
                    
                    {{-- <time datetime=""><a style="height: 39px; padding-top: 15px;" href="/categories/{{ $post->category->name }}">{{ $post->created_at->format(' jS  F ') }} - {{ $post->category->name }}</a>
                    </time>
                    @if (Auth::check() && Auth::user() == $post->user()->first())
                        <time><a id="btn-tooltip" title="Delete post" href="#"><i data-dialog="somedialog"  class="fas fa-trash-alt trigger"></i></a></time>
                            
                        <time><a id="btn-tooltip" title="Edit post" href="/posts/{{ $post->slug }}/edit"><i class="fas fa-edit"></i></a></time>
                    @endif --}}
                    <h2>{{ $post->title }}</h2>

                    {!! 
                        str_replace('<img', '<img class="img-responsive" id="no-effects" style="max-width: 100%"', Markdown::convertToHtml(
                            e($post->body)
                        ))
                    !!}
                    <footer>
                        <strong class="text"><span class="icon ico-user"></span><a href="/users/{{ $post->user->nickname }}">{{ $post->user->nickname }}</a></strong>
                        <strong class="text comment-count"><span class="icon ico-comment"></span><a href="#comments">{{ count($post->comments)}} comments</a></strong>
                        <strong class="text"><span class="icon ico-tag"></span>Tags: 
                            @foreach ($post->tags as $tag)
                                <a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }},</a>
                            @endforeach
                        </strong>
                        @if (Auth::check() && Auth::user() == $post->user()->first())
                            <strong class="text" style="float:right">
                                <a id="btn-tooltip" title="Edit post" href="/posts/{{ $post->slug }}/edit"><i class="fas fa-edit"></i></a>
                                <a id="btn-tooltip" title="Delete post" href="#"><i data-dialog="somedialog"  class="fas fa-trash-alt trigger"></i></a>
                            </strong>
                        @endif
                    </footer>
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
@role ('registered')
	<div id="dialogEffects" class="don">
		<div id="somedialog" class="dialog">
			<div class="dialog__overlay"></div>
			<div class="dialog__content">
				<h2><strong>Do you really want to delete this post?</h2>
				<div><button class="action" ><a href="/posts/{{ $post->slug }}/delete">Yes</a></button>
				<button class="action" data-dialog-close="">Close</button></div>
			</div>
		</div>
	</div>
@endrole

@endsection