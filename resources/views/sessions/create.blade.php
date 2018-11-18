@extends ('layouts.master')
@section ('content')
<div class="col-md-9">
    <h1>Sign In</h1>

    <form method="POST" action="/login">
        @csrf
  
        @include ('layouts.errors')
  
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" class="form-control" id="email"  name="email">
        </div>
  
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password"  name="password">
        </div>
  
        <button type="submit" class="btn btn-primary">Sign In</button>
      </form>

</div>
@endsection