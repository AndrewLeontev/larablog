@extends ('layouts.master')
@section ('content')
<div class="col-md-9">

  <h1>Create User</h1>

  <form method="POST" action="/register">
      @csrf

      @include ('layouts.errors')

      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name"  name="name">
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email"  name="email">
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password"  name="password">
      </div>

      <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" class="form-control" id="password_confirmation"  name="password_confirmation">
      </div>

      <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection