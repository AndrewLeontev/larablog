@extends ('layouts.master')
@section('content')

<div class="col-md-9 col-sm-12">

    <a href="/admin">
        <button class="learn-more">
                <div class="circle">
                  <span class="icon arrow"></span>
                </div>
                <p class="button-text">Back</p>
        </button>
    </a>

    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Owner</th>
                <th>Title</th>
                <th style="max-width: 55px;">Body</th>
                <th>Category</th>
                <th>Created At</th>
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
                {data: 'user_id'},
                {data: 'title'},
                {data: 'body'},
                {data: 'category_id'},
                {data: 'created_at'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>

@endsection  



