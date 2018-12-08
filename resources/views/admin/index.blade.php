@extends ('layouts.master')
@section ('content')
<div class="col-md-9">
    <h1>Welcome to Admin page</h1>
    <div class="row">
        <div class="col-lg-3 col-md-6 pan">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-file-alt fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ count(App\Post::all()) }}</div>
                            <div>Tottal posts</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/posts">
                    <div class="panel-footer">
                        <span class="pull-left">View all</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 pan">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ count(App\User::all()) }}</div>
                            <div>Tottal users</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/users">
                    <div class="panel-footer">
                        <span class="pull-left">View all</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 pan">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ count(App\Comment::all()) }}</div>
                            <div>Tottal comments</div>
                        </div>
                    </div>
                </div>
                <a href="/comments">
                    <div class="panel-footer">
                        <span class="pull-left">View all</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        

        <div class="col-lg-3 col-md-6 pan">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ count(App\Tag::all()) }}</div>
                            <div>Tottal tags</div>
                        </div>
                    </div>
                </div>
                <a href="/tags">
                    <div class="panel-footer">
                        <span class="pull-left">View all</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection