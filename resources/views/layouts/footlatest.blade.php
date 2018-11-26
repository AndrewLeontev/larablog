<div class="col-md-3 footer_grid1">
    <h3>From the Blog</h3>
    @foreach ($latestPosts as $post)
      <ul class="list1 list2">
        {{-- <li class="list1_img"><img src="/images/f1.jpg" class="img-responsive" alt=""/></li> --}}
        <li class="list1_desc">
          <p class="m_3">{{ $post->title }}</p>
          <p class="m_2">{{ $post->created_at->formatLocalized('%B %d, %Y')}}</p>
        </li>
        <div class="clearfix"> </div>
      </ul>
    @endforeach
</div>