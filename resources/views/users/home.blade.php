@extends ('layouts.master')

@section ('content')

	<div class="col-md-9 col-sm-12">
            @if (Auth::check())
                <div class="col-sm-12 marg">
                    <a class="col-sm-12" href="/posts/create">
                            <i class="fas fa-pencil-alt"></i> Create new post
                    </a>
                </div>
                <h3 class="myposts">My posts: </h3>
                
                @if (count($posts))
		            <section class="posts-blocks">
                        <div class="blog_left post_show post_index">
                            <div class="row">
                                @foreach ($posts as $post)
                                    @include ('layouts.post')
                                @endforeach  
                            </div>
                        </div>
		            </section>
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