@extends ('layouts.master')
@section ('content')

<div class="col-md-9 col-sm-12">
    <div class="user-head">
        <h3>All posts by {{ $user->nickname }}</h3> 
        <span stye="">Total: {{ count($user->posts()->get()) }}</span>
    </div>
    
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
</div>

@endsection