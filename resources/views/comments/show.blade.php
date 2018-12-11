<h3>Comments ({{ count($post->comments) }}):</h3>
@if (count($post->comments))
  @foreach($post->comments as $comment)
    <div class="comment row">
        <div class="avatar-com col-sm-2">
            <img class="img-responsive" 
                    style="display:inline-block" 
                    src="/uploads/avatars/{{ $comment->user->avatar }}" 
                    alt="avatar">
        </div>
        <div class="comment-name col-sm-8"> 
          <a href="/users/{{ $comment->name }}">
            <h3 style="display: inline-block">{{ $comment->name }}</h3>
          </a>
          <p class="comment-time" >{{ $comment->created_at->diffForHumans() }}</p>
        </div>
        <p class="comment-body col-sm-10">{{ $comment->body }}</p>
    </div>
  @endforeach
@else
  <p>There are no comments yet</p>
@endif