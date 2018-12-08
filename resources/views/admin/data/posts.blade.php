@extends ('layouts.master')
@section('content')

<div class="col-md-9">

    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Owner</th>
                <th>Title</th>
                <th>Body</th>
                <th>Category</th>
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
            ajax: '/admin/posts/data',
            columns: [
                {data: 'id'},
                {data: 'user_id'},
                {data: 'title'},
                {data: 'body'},
                {data: 'category_id'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endsection  

