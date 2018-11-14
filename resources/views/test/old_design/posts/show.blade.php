@extends ('layouts.master')
@section ('content')

<div class="col-md-8 blog-main">
  <div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title }}</h2>

    <p>
      {{ $post->body }}
    </p>
  </div>
</div>

@endsection