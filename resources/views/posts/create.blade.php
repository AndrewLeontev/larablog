@extends ('layouts.master')
@section ('content')

<div class="col-md-9">

    <h1>Create a Post</h1>
      <form method="POST" action="/posts">
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

          <button type="submit" class="btn btn-primary">Post</button>
        </form>

</div>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

<script>
  var simplemde = new SimpleMDE({ element: document.getElementById("body inp") });
</script>
@endsection