<div class="col-md-3 footer_grid1">
    <h3>From the Blog</h3>
    @foreach ($latestPosts as $post)
      <ul class="list1 list2">
        <li class="list1_desc row">
          <li class="list1_img"><img src="/uploads/posts/{{ $post->post_image }}" class="img-responsive" alt=""/></li>
          <a href="/posts/{{ $post->id }}"><p class="m_3">{{ $post->title }}</p></a>
          <p style="padding-left: 70px;" class="m_2">{{ $post->created_at->formatLocalized('%B %d, %Y')}}</p>
        </li>
        <div class="clearfix"> </div>
      </ul>
    @endforeach
</div>