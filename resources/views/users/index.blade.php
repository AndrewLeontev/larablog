@extends ('layouts.master')
@section ('content')
<div class="col-md-9 col-sm-12">

  <div class="panel panel-default">
    <div class="panel-heading">
      All users
    </div>

    <div class="panel-body">
      <table class="table table-striped task-table">
        <thead>
          <th>Avatar</th>
          <th>User</th>
          <th>Posts</th>
          <th>Registered</th>
          @role ('registered')
          <th> </th>
          @endrole
        </thead>

        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>
                <div class="avatar">
                  <img src="/uploads/avatars/{{ $user->avatar }}" alt=""  class="img-responsive">
                </div>
              </td>
              
              <td clphpass="table-text">
                <div>{{ $user->nickname }}</div>
              </td>

              <td class="table-text">
                <div>{{ count($user->posts) }}</div>
              </td>

              <td clphpass="table-text">
                <div>{{ $user->created_at->toFormattedDateString() }}</div>
              </td>

              @role ('registered')
              @if (auth()->check() && auth()->user()->isFollowing($user->nickname))
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
                    <button style="float:right" type="submit" id="delete-follow-{{ $user->nickname }}" class="btn btn-danger">
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