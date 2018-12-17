@extends ('layouts.master')

@section ('content')
<div class="col-md-9">

    <div class="blog_left single_left post_show">
        <h1>Edit post</h1>
        
        <form method="POST" enctype="multipart/form-data" action="/posts/{{ $post->id }}">
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

            <div class="form-group">
              {{-- <label for="post_image">Post image</label> --}}
              {{-- <input type="file" id="post_image" name="post_image"> --}}
              <label for="post_image">Post:image:</label>
              <input type="file" name="post_image" id="post_image" class="inputfile inputfile-2">
              <label for="post_image"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> 
                <span>{{ $post->post_image }}</span>
              </label>


            </div>
            <button type="submit" class="btn btn-primary center-block">Update post</button>
  
          </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

<script>
  var simplemde = new SimpleMDE({ element: document.getElementById("body inp") });
</script>
@endsection