@extends ('layouts.master')
@section ('content')


<div class="col-md-9 col-sm-12">
                
        <div class="row">
                <div class="col-sm-12">
                        <div class="avatar-profile">
                                <img src="/uploads/avatars/{{ $user->avatar }}" class="img-fluide center-block">                
                        </div>

                </div>
                <div class="col-sm-12">
                                <div class="center-block center-text">
                                        <form enctype="multipart/form-data" action="/profile" method="POST">
                                                {{ method_field('PATCH') }}
                                                @csrf

                                                <input type="file" name="avatar" id="avatar" class="inputfile inputfile-2">
                                                <label for="avatar"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Choose a file…</span></label>

                                                <button id="upd-btn" type="submit"  class="inputfile inputfile-2"><i class="fa fa-upload"></i> Upload</button>

                                                
                                        </form>                               
                                </div>
        
                        </div>
                <div class="col-sm-12 marg">
                        <h1>{{ $user->nickname }}</h1>
                </div>
                <div class="col-sm-12 marg">
                        <a href="/user/edit/{{ $user->nickname }}">
                                <i class="fas fa-user-edit"></i> Edit profile
                        </a>
                        <a href="/posts/create">
                                <i class="fas fa-pencil-alt"></i> Create post
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

                @if (count($posts))
                <table id="fresh-table" class="table">
                        <thead>
                                <th data-field="id">Title</th>
                                <th data-field="name">Created At</th>
                                <th data-field="actions">Actions</th>
                        </thead>
                        <tbody>
                                @foreach($posts as $post)
                                <tr>

                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                                <a id="btn-tooltip" title="Edit post" href="/posts/{{ $post->slug }}/edit"><i class="fas fa-edit"></i></a>
                                                <a id="btn-tooltip" title="Delete post" href="#"><i data-dialog="somedialog"  class="fas fa-trash-alt trigger"></i></a>

                                        </td>
                                </tr>
                                
                                @endforeach
                        </tbody>
                </table>
                {{ $posts->links() }}
                @role ('registered')
                        <div id="dialogEffects" class="don">
                                <div id="somedialog" class="dialog">
                                        <div class="dialog__overlay"></div>
                                        <div class="dialog__content">
                                                <h2><strong>Do you really want to delete this post?</h2>
                                                <div><button class="action" ><a href="/posts/{{ $post->slug }}/delete">Yes</a></button>
                                                <button class="action" data-dialog-close="">Close</button></div>
                                        </div>
                                </div>
                        </div>
                @endrole
                @endif
                

        </div>
</div>

@endsection