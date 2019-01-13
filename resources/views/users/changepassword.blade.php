@extends ('layouts.master')
@section ('content')
<div class="col-md-9 col-sm-12">
        <h1>Change password</h1>
          
        <form method="POST" action="/user/{{ $user->nickname }}/password">
            @csrf
            {{ method_field('PATCH') }}
  
            @include ('layouts.errors')

            <div class="form-group">
              <label for="old_password">Old password:</label>
              <input type="password" class="form-control" id="old_password"  name="old_password">
            </div>

            <div class="form-group">
              <label for="password">New password:</label>
              <input type="password" class="form-control" id="password"  name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" class="form-control" id="password_confirmation"  name="password_confirmation">
            </div>

            <center><button type="submit" class="btn btn-primary">Update profile</button></center>
          </form>
</div>
@endsection