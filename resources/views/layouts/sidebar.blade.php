<div class="col-md-3 sidebar">
      <div class="search">
       <form method="GET" action="/search">
          @csrf
        <input type="text" name="search" id="search" value="Search..." onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
        <input type="submit" value="">
       </form>
     </div>

     <?php
      $user = Auth::user();
     ?>
      <div class="user-sidebar">
         @if (Auth::check())
            <h3>Logged in as {{ $user->name }} <br> Posts: <a href="/home">{{ count($user->posts()->get()) }}</a></h3>
            <img class="img-responsive avatar" src="/images/blog_s4.png" alt="avatar">
            <div class="btn-side">
                  <a class="btn btn-info new-post" href="/home">My Posts</a>
                  <a class="btn btn-info new-post" href="/posts/create">Create new post</a>
                  <a class="btn btn-info new-post" href="/user/edit/{{ $user->name }}">Edit profile</a>
                  <a class="btn btn-info new-post" href="#">Dashboard</a>
                  <a class="btn btn-info new-post" href="/logout">Logout</a>
            </div>
         @else
         <a class="btn btn-info new-post" href="/login">Login</a>
         <a class="btn btn-info new-post" href="/register">Register</a>
         {{-- <img src="/images/2.jpg" class="img-responsive" alt=""/> --}}
         @endif
      </div>
      <div class="clearfix"> </div>

     <ul class="blog-list">
        <h3>Categories</h3>
        @foreach ($categories as $category)
        <li><a href="/categories/{{ $category->name }}">{{ $category->name }}</a></li>
        @endforeach
     </ul>
     
     <div class="blog_list2">
         <h3>Recent Posts</h3>
         @include ('layouts.recent')
      </div>
      
     <ul class="blog-list1">
        <h3>Archives</h3>
         @foreach ($archives as $stats)
            <li>
               <a href="/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
                  {{ $stats['month'] . ' ' . $stats['year'] }}
               </a>
            </li>
         @endforeach
     </ul>
     <ul class="blog-list1">
        <h3>Tags</h3>
        @foreach ($tags as $tag)
            <li><a href="/posts/tags/{{ $tag }}">{{ $tag }}</a></li>
        @endforeach
     </ul>
   </div>
 <div class="clearfix"> </div>
