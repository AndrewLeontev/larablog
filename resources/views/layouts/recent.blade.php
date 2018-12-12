
    @foreach ($latestPosts as $post)
        <ul class="blog-list3">
            <li class="blog-list3-img"><img src="/uploads/posts/{{ $post->post_image }}"" class="img-responsive" alt=""/></li>
            <li class="blog-list3-desc">
                <h4><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                <p>{{ $post->created_at->formatLocalized('%A %d %B %Y') }}</p>
            </li>
            <div class="clearfix"> </div>
        </ul>
    @endforeach
