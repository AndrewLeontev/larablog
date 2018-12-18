@extends ('layouts.master')
@section('content')

<div class="col-md-9 col-sm-12">

    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Nickname</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $(function () {
        $('#users-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/admin/users/data',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'nickname'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endsection  

