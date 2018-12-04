@extends ('layouts.master')

@section ('content')
<div class="col-md-9">

    <div class="blog_left single_left post_show">
        <h1>Edit post</h1>
        
        <form method="POST" action="/posts/{{ $post->id }}">
            @csrf
            {{ method_field('PATCH') }}
  
            @include ('layouts.errors')
  
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title"  name="title" value="{{ $post->title }}">
            </div>
  
            <div class="form-group">
              <label for="body">Body</label>
              <textarea name="body" class="form-control" id="body inp" cols="30" rows="10">{{ $post->body }}</textarea>
            </div>
  
            <div class="form-group">
              <label for="category_id">Categories</label>
              <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                  @if ($category->id == $post->category_id)
                    <option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                  
                @endforeach
              </select>
            </div>
  
            <div class="form-group">
                <label for="tags">Tags</label>
                <?php
                  $tagstr = "";
                  foreach ($post->tags()->pluck('name') as $tag) {
                    $tagstr .= $tag . " ";
                  }
                ?>
                <input type="text" class="form-control" id="tags"  name="tags"  value="{{ $tagstr }}">
            </div>
  
            <center><button type="submit" class="btn btn-primary">Update post</button></center>
          </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

<script>
  var simplemde = new SimpleMDE({ element: document.getElementById("body inp") });
</script>
@endsection