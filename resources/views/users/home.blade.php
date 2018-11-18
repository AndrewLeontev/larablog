@extends ('layouts.master')

@section ('content')

	<div class="col-md-9">
            @if (Auth::check())
                <h3>Hello, {{ Auth::user()->name}}!</h3>
                <a class="btn btn-info" href="/posts/create">Create new post</a>
            @else
                <h4>You don't have permissions</h4>
            @endif
    </div>
@endsection