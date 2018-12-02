<div class="tags">
    @if (count($post->tags))
            <ul class="blog-list1"> <span class="tags-head">Tags:</span>
                    @foreach ($post->tags as $tag)
                    <li>
                            <a href="/posts/tags/{{ $tag->name }}">
                                    {{ $tag->name }}
                            </a>
                    </li>   
            @endforeach
            </ul>
    @endif
</div>