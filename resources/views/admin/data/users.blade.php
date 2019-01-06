@extends ('layouts.master')
@section('content')
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

                        <button data-dialog="somedialog" title="delete user" class="btn btn-danger trigger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </th>
                </tr>
                
                <div id="dialogEffects" class="sandra">
                    <div id="somedialog" class="dialog">
                        <div class="dialog__overlay"></div>
                        <div class="dialog__content">
                            <h2><strong>Do you really want to delete this user - {{ $user->nickname }}?</h2>
                            <div><a href="/admin/user/{{ $user->nickname }}/delete"><button class="action" >Yes</button></a>
                            <button class="action" data-dialog-close="">Close</button></div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    @endrole
</div>
@endsection  

