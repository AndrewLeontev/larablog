@extends ('layouts.master')
@section ('content')

<div class="col-md-9">
    <div class="user-head">
        <h3>All posts by {{ $user->nickname }}</h3> 
        <span stye="">Total: {{ count($user->posts()->get()) }}</span>
    </div>
    
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
</div>

@endsection