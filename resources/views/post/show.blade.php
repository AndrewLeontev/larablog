@extends ('layouts.master')
@section ('content')

@include ('layouts.modal')

<div class="col-md-9 col-sm-12">

        <div class="post-block single-post wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="post-holder">
                    <div class="img-holder">
                        <img style="max-width: 720px; max-height: 435px;" src="/uploads/posts/{{ $post->post_image }}" alt="post image">
                    </div>

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
                                <a style="display: inline-block; font-size: 18px;" data-toggle="dataTable" data-form="deleteForm">
                                        {!! Form::model($post, ['method' => 'delete', 'route' => ['posts.destroy', $post->slug], 'class' =>'form-inline form-delete']) !!}
                                        {!! Form::hidden('slug', $post->slug) !!}
                                        <i  class="fas fa-trash-alt">
                                            {!! Form::submit(trans(""), ['class' => 'btn btn-xs btn-danger delete', 'id' => 'none-display', 'name' => 'delete_modal']) !!}
                                        </i>
                                        {!! Form::close() !!}
                                </a>
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
@endsection