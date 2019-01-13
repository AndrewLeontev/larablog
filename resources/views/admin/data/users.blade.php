@extends ('layouts.master')
@section('content')

@include ('layouts.modal')
<div class="col-md-9 col-sm-12">
    @role ('admin')
    <div class="panel panel-default">
        <div class="panel-heading">
        All users
        </div>

        <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
            <th scope="col">Avatar</th>
            <th scope="col">User</th>
            <th scope="col">Registered</th>
            <th scope="col"></th>
            </thead>

            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">
                        <div class="avatar">
                        <img src="/uploads/avatars/{{ $user->avatar }}" alt=""  class="img-responsive">
                        </div>
                    </th>
                    
                    <th clphpass="table-text">
                        <div>{{ $user->nickname }}</div>
                    </th>

                    <th clphpass="table-text">
                        <div>{{ $user->created_at->toFormattedDateString() }}</div>
                    </th>

                    <th class="actions">
                        <button title="edit user" onClick='location.href="/user/edit/{{ $user->nickname }}"' class="btn btn-success">
                            <i class="fas fa-edit"></i>
                        </button>

                        <button title="ban user" class="btn btn-success">
                            <i class="fas fa-ban"></i>
                        </button>

                        <a style="font-size:18px; display: inline-block;" data-toggle="dataTable" data-form="deleteForm">
                                {!! Form::model($user, ['method' => 'delete', 'route' => ['admin.deleteuser', $user->nickname], 'class' =>'form-inline form-delete']) !!}
                                {!! Form::hidden('slug', $user->nickname) !!}
                                <button title="delete user" class="btn btn-danger">
                                    <i class="fas fa-trash">
                                        {!! Form::submit(trans(""), ['class' => 'btn btn-xs btn-danger delete', 'id' => 'none-display', 'name' => 'delete_modal']) !!}
                                    </i>
                                </button>
                                {!! Form::close() !!}
                        </a>
                        
                        
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    @endrole
</div>
@endsection  

