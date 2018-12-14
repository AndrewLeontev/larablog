@extends ('layouts.master')
@section ('content')

<link href="http://demos.creative-tim.com/fresh-bootstrap-table/assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
<script type="text/javascript" src="http://demos.creative-tim.com/fresh-bootstrap-table/assets/js/bootstrap-table.js"></script>


<div class="col-md-9">
                
        <div class="row">
                <div class="col-sm-12">
                        <div class="avatar-profile">
                                <img src="/uploads/avatars/{{ $user->avatar }}" class="img-fluide center-block">                
                        </div>
                </div>
                <div class="col-sm-12 marg">
                        <h1>{{ $user->nickname }}</h1>
                </div>
                <div class="col-sm-12 marg">
                        <a href="/user/edit/{{ $user->nickname }}">
                                <i class="fas fa-user-edit"></i> Edit profile
                        </a>
                </div>
                
                <div class="col-sm-12 center-block center-text tabs">
                        <div class="col-sm-6">
                                <h3 class="counter">{{ count($user->posts) }}</h3>
                                <div class="tabs-h">
                                        <h3>Posts</h3>
                                </div>
                        </div>
                        
                        <div class="col-sm-6">
                                <h3 class="counter">{{ count($user->comments) }}</h3>
                                <div class="tabs-h">
                                        <h3>Comments</h3>
                                </div>
                        </div>
                </div>
                        <div class="col-sm-12" style="padding-top: 15px">
                                <div class="fresh-table toolbar-color-blue">
                                <div class="toolbar">
                                        <button id="alertBtn" class="btn btn-default">All posts</button>
                                </div>
                                <table class="table"  id="fresh-table">
                                        <thead>
                                                {{-- <tr> --}}
                                                <th data-field="title" data-sortable="true">Title</th>
                                                <th data-field="created_at"  data-sortable="true">Created at</th>
                                                <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Action</th>
                                                {{-- </tr> --}}
                                        </thead>
                                        <tbody>
                                                @foreach ($posts as $post)
                                                        {{-- @include ('layouts.post'); --}}
                                                        <tr>
                                                                <td><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></td>
                                                                <td>{{ $post->created_at->toFormattedDateString() }}</td>
                                                                <td>
                                                                        {{-- <a href="/posts/{{ $post->slug }}/edit"><i class="fas fa-edit"></i></a>
                                                                        <a href=""><i class="fas fa-trash-alt trigger"></i></a> --}}

                                                                </td>
                                                        </tr>
                                                @endforeach
                                        </tbody>
                                </table>
                        </div>


                </div>
            
            <div class="col-md-12">
            </div>
        </div>
</div>

<script>
 var $table = $('#fresh-table'),
 full_screen = false;
 
 $().ready(function(){
 $table.bootstrapTable({
 toolbar: ".toolbar",
 
 showRefresh: true,
 search: true,
 showToggle: true,
 showColumns: false,
 pagination: true,
 striped: true,
 pageSize: 8,
 pageList: [8,10,25,50,100],
 
 formatShowingRows: function(pageFrom, pageTo, totalRows){
        //do nothing here, we don't want to show the text "showing x of y from..." 
        },
        formatRecordsPerPage: function(pageNumber){
                return pageNumber + " rows visible";
        },
        icons: {
                refresh: 'fas fa-sync-alt',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
        }
 });
 
 
 
 $(window).resize(function () {
 $table.bootstrapTable('resetView');
 });
 
 
 window.operateEvents = {
        'click .like': function (e, value, row, index) {
                alert('You click like icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);
        },
        'click .edit': function (e, value, row, index) {
                alert('hello');
        },
        'click .remove': function (e, value, row, index) {
                $table.bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
                });
        }
 };
 
 });
 
 
 function operateFormatter(value, row, index) {
 return [
 '<a rel="tooltip" title="Edit" class="table-action edit" href="/posts/{{ $post->slug }}/edit" title="Edit">',
 '<i class="fas fa-edit"></i>',
 '</a>',
 '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
 '<i class="fas fa-trash-alt"></i>',
 '</a>'
 ].join('');
 }
 
 
 </script>
@endsection