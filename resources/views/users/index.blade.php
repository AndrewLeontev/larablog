@extends ('layouts.master')
@section ('content')
<div class="col-md-9 col-sm-12">

  <div class="panel panel-default">
    <div class="panel-heading">
      All users
    </div>

    <div class="panel-body">
      <table class="table table-striped task-table">
        <thead id="thead">
          <th>Avatar</th>
          <th>User</th>
          <th>Posts</th>
          <th>Registered</th>
          @role ('registered')
          <th></th>
          @endrole
        </thead>

        <tbody>
          @foreach ($users as $user)
            <tr class="user-tr">
              <td class="centered-text">
                <div class="avatar ">
                  <img src="/uploads/avatars/{{ $user->avatar }}" alt=""  class="img-responsive">
                </div>
              </td>
              
              <td class="centered-text">
                <div><a style="color:blue" href="/users/{{ $user->nickname }}">{{ $user->nickname }}</a></div>
              </td>

              <td>
                <div>{{ count($user->posts) }} posts</div>
              </td>

              <td>
                <div>Registered at {{ $user->created_at->toFormattedDateString() }}</div>
              </td>

              @role ('registered')
              @if (auth()->user()->isFollowing($user->nickname))
                <td>
                  <form action="{{ route('unfollow', ['nickname' =>$user->nickname]) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button style="float:right" type="submit" id="delete-follow-{{ $user->nickname }}" class="btn btn-danger">
                      <i class="fa fa-btn fa-trash"></i> Unfollow
                    </button>
                  </form>
                </td>
              @else 
                <td>
                  <form action="{{ route('follow', ['nickname' =>$user->nickname]) }}" method="post">
                    @csrf
                    <button style="min-width: 95px;float:right" type="submit" id="delete-follow-{{ $user->nickname }}" class="btn btn-success">
                      <i class="fa fa-btn fa-user"></i> Follow
                    </button>
                  </form>
                </td>
              @endif  
              @endrole
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection