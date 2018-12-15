@extends ('layouts.master')

@section ('content')

	<div class="col-md-9">
            @if (Auth::check())
                <h3 class="myposts">My posts: </h3>
                @if (count($posts))
                    @foreach ($posts as $post)
                        @include ('layouts.post')
                    @endforeach 
                    @role ('registered')
                    <div id="dialogEffects" class="sally">
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