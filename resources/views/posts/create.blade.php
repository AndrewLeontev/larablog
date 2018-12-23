@extends ('layouts.master')
@section ('content')

<div class="col-md-9 col-sm-12">

    <h1>Create a Post</h1>
      <form method="POST" enctype="multipart/form-data" action="/posts">
          @csrf

          @include ('layouts.errors')

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title"  name="title">
          </div>

          <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" class="form-control" id="body inp" cols="30" rows="10"></textarea>
          </div>

          <div class="form-group">
            <label for="category_id">Categories</label>
            <select name="category_id" id="category_id" class="form-control">
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
              <label for="tags">Tags</label>
              <input type="text" class="form-control" id="tags"  name="tags">
          </div>


          <input type="file" name="post_image" id="post_image" class="inputfile inputfile-2">
          <label for="post_image"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Choose a file…</span></label>

          <center><button type="submit" class="btn btn-primary">Post</button></center>
        </form>

</div>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

<script>
  var simplemde = new SimpleMDE({ 
    element: document.getElementById("body inp"),
    autosave: {
        enabled: true,
        uniqueId: "body inp",
        delay: 1000,
    }, 
    lineWrapping: false,
    styleSelectedText: true,

  });
</script>
@endsection