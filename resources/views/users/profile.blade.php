@extends ('layouts.master')
@section ('content')
<div class="col-md-9">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="avatar-profile">
                        <img src="/uploads/avatars/{{ $user->avatar }}" class="img-fluid">
                </div>
                <div class="col-md-5" style="padding: 10px 20px;">
                        <h2>{{ $user->name }}'s Profile</h2>
                        <form enctype="multipart/form-data" action="/profile" method="POST">
                              {{ method_field('PATCH') }}
                              @csrf
        
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            <button type="submit" class="avatar-submit"><i class="fa fa-upload"></i> Upload</button>
                        </form>
                </div>
                <div class="col-md-4">
                       <h3>Total posts: {{ count($user->posts) }}</h3>
                       <h3>Total comments: {{ count($user->comments) }}</h3>
                </div>
            </div>
        </div>
</div>
@endsection