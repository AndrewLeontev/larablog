@extends ('layouts.master')
@section ('content')
<div class="col-md-9">

  <center><h1 class="form-head">Create User</h1></center>

  <form method="POST" action="/register">
      @csrf

      @include ('layouts.errors')

      <div class="form-group row">
        <div class="col-sm-4">
            <label for="name">Name:</label>
        </div>
        <div class="col-sm-8" >
            <input type="text" class="form-control" id="name"  name="name" placeholder="name">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-4" >
            <label for="nickname">Nickname (required):</label>
        </div>
        <div class="col-sm-8" >
            <input id="nickname" type="text" class="form-control" id="nickname"  name="nickname" 
              pattern="^[A-Za-z][A-Za-z0-9_]{3,25}$"
              placeholder="Nickname"
              title="Consists of numbers, letters of the Latin alphabet, underscore and have minum 3 symbol">
              <span class="form__error">Consists of numbers, letters of the Latin alphabet, underscore and have minum 3 symbol</span>
        </div>
      </div>
      

      <div class="form-group row">
        <div class="col-sm-4" >
            <label for="email">Email (required):</label>
        </div>
        <div class="col-sm-8" >
            <input type="email" class="form-control" id="email"  name="email" placeholder="name@example.com">
            <span class="form__error">Email must be like: name@example.com</span>

        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-4" >
            <label for="password">Password (required):</label>
        </div>
        <div class="col-sm-8" >
            <input type="password" class="form-control" id="password"  name="password" placeholder="password">
        </div>
      </div>
      
      <div class="form-group row">
        <div class="col-sm-4" >
            <label for="password_confirmation">Confirm Password (required):</label>
        </div>
        <div class="col-sm-8" >
            <input type="password" class="form-control" id="password_confirmation"  name="password_confirmation"  placeholder="password">
        </div>
      </div>

      <div class="info-session">ALREADY HAVE AN ACCOUNT? <a href="/register">Login</a></div>
      
      <center><button type="submit" class="btn btn-primary">Register</button></center>
    </form>
</div>
@endsection