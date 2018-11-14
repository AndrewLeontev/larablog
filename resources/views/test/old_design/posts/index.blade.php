@extends ('layouts.master')

@section ('content')

      <div class="jumbotron p-3 p-md-5 rounded">
          <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
            <p class="lead mb-0"><a href="/about" class="font-weight-bold">Continue reading...</a></p>
          </div>
      </div>
      <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
          All Posts
        </h3>

        {{-- {{ dd($posts) }} --}}
        @if (count($posts)) 
          @foreach ($posts as $post)
            <div class="blog-post">
              <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta">{{ $post->created_at }} | Category: <a href="/categories/{{ strtolower($post->categories) }}">{{ strtolower($post->categories) }}</a></p>
          
              <p>
                {{ $post->body }}
              </p>
              <a class="btn btn-outline-primary" href="/posts/{{ $post->id }}">Read</a>
            </div>
          @endforeach
        @else 
          <div class="blog-post">
              <h2 class="blog-post-title">
                There are no posts yet
              </h2>
          </div>
        @endif
        
        

        <nav class="blog-pagination">
          <a class="btn btn-outline-primary" href="#">Older</a>
          <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

      </div><!-- /.blog-main -->

@endsection