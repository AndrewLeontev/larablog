@extends ('layouts.master')

@section ('content')

	<div class="col-md-9">
            @if (Auth::check())
                <h3 class="myposts">My posts: </h3>
                @if (count($posts))
                    @foreach ($posts as $post)
                        @include ('layouts.post')
                    @endforeach  
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