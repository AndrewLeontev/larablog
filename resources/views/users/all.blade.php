@extends ('layouts.master')

@section ('content')
    <div class="col-md-9">

        <h1>All users: </h1>
        <table class="users table display responsive nowrap dataTable no-footer collapsed" id="users-table">
            <thead>
                <tr>
                    <th style="max-width: 50px;">Avatar</th>
                    <th data-priority="1">Nickname</th>
                    <th>Name</th>
                    <th>Posts</th>
                    <th data-priority="2">Created At</th>
                </tr>
            </thead>
        </table>
    </div>

<script>
    $(function () {
        $('#users-table').DataTable({
            serverSide: true,
            responsive: true,
            processing: true,
            scrollX: 450,
            scrollY: false,
            scrollCollapse: true,
            scroller: true,
            ajax: '/users/all',
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            columns: [
                {data: 'avatar', orderable: false, searchable: false},
                {data: 'nickname'},
                {data: 'name'},
                {data: 'posts', orderable: false, searchable: false},
                {data: 'created_at', orderable: false, searchable: false},
            ]
        });
    });
</script>

@endsection