<h3>Comments ({{ count($post->comments) }}):</h3>
@if (count($post->comments))
  @foreach($post->comments as $comment)
    <div class="comment row">
        <img src="/images/blog_s4.png" class="img-responsive col-sm-2 avatar" alt="" style="max-width: 100px; max-height: 100px; display: inline-block">
        <h3 class="col-sm-10" style="display: inline-block">{{ $comment->name }}</h3>
        <p class="comment-time col-sm-2" >{{ $comment->created_at->diffForHumans() }}</p>
        <p class="comment-body col-sm-12">{{ $comment->body }}</p>
    </div>
  @endforeach
@else
  <p>There are no comments yet</p>
@endif