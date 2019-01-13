@extends ('layouts.master')

@section ('content')
<div class="col-md-9 col-sm-12">

    <div class="blog_left single_left post_show">
        @if ($user == Auth::user())
          <h1>Edit user</h1>
          
          <form method="POST" action="/users/{{ $user->nickname }}">
              @csrf
              {{ method_field('PATCH') }}
    
              @include ('layouts.errors')
    
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name"  name="name" value="{{ $user->name }}">
              </div>
    
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"  name="email" value="{{ $user->email }}">
              </div>

              <div class="form-group">
                <label for="password">For submiting changes type password</label>
                <input type="password" class="form-control" id="password"  name="password">
              </div>
              <div class="form-group">
                <a class="link" href="/user/{{ $user->nickname }}/password/">Edit password</a>
              </div>
              <center><button type="submit" class="btn btn-primary">Update profile</button></center>
            </form>
          @else 
            <h1>You don't have permissions</h1>
          @endif
    </div>
</div>

@endsection