@extends ('layouts.master')
@section ('content')
<div class="col-md-9 col-sm-12">
    <h2>All tags: </h2>
    <ul class="blog-list1">
        @foreach ($tags as $tag)
            <li><a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a></li>
        @endforeach
    </ul>

</div>
@endsection