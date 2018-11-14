@extends ('layouts.master')
@section ('content')

<div class="col-md-8 blog-main">

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
          <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
          <label for="categories">Categories</label>
          <input type="text" class="form-control" id="categories"  name="categories">
        </div>

        <button type="submit" class="btn btn-primary">Post</button>
      </form>

</div>

@endsection