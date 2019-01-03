@extends ('layouts.master')
@section ('content')

<div class="col-md-9 col-sm-12">
    <div class="user-head">
        <div class="user-info">

            <div class="grid-container">
                {{-- <div class="avatar"> --}}
                    <img src="/uploads/avatars/{{ $user->avatar }}" alt="" class="avatar">
                {{-- </div> --}}
                <div class="nickname">
                    <h3 class="nickname">{{ $user->nickname }}</h3>
                </div>
                <div class="follow">
                    @role ('registered')
                        @if (auth()->user()->isFollowing($user->nickname))
                            <div class="follow">
                                <form action="{{ route('unfollow', ['nickname' =>$user->nickname]) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" id="delete-follow-{{ $user->nickname }}" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i> Unfollow
                                </button>
                                </form>
                            </div>
                            @else 
                            <div class="follow">
                                <form action="{{ route('follow', ['nickname' =>$user->nickname]) }}" method="post">
                                @csrf
                                <button type="submit" id="delete-follow-{{ $user->nickname }}" class="btn btn-danger">
                                    <i class="fa fa-btn fa-user"></i> Follow
                                </button>
                                </form>
                            </div>
                        @endif  
                    @endrole
                </div>
                <div class="posts">
                    <h3>Posts: {{ count($user->posts) }}</h3>
                </div>
                <div class="comments-profile">
                    <h3>Comments: {{ count($user->comments) }}</h3>                    
                </div>
            </div>
        </div>
    </div>
    
    <h3 class="all">All posts by {{ $user->nickname }}</h3> 
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