@extends ('layouts.master')
@section ('content')
<div class="col-md-9">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="avatar-profile">
                        <img src="/uploads/avatars/{{ $user->avatar }}" class="img-fluid">
                </div>
                <div class="col-md-8">
                        <h2>{{ $user->name }}'s Profile</h2>
                        <form enctype="multipart/form-data" action="/profile" method="POST">
                              {{ method_field('PATCH') }}
                              @csrf
        
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            <button type="submit" class="avatar-submit"><i class="fa fa-upload"></i> Upload</button>
                        </form>
                </div>
            </div>
        </div>
</div>
@endsection