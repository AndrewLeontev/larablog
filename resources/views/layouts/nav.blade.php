<!----start-header---->
<div class="header">
  <div class="container">
    <div class="header_top">
      <div class="logo">
        <a href="/"><img src="/images/logo.png" alt=""></a>
      </div>
      <div class="menu">
      <a class="toggleMenu" href="#"><img src="/images/nav_icon.png" alt="" /> </a>
      <ul class="nav topmenu" id="nav">
        <li><a href="/">Home</a></li>
        <li><a href="/users">Users</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/contacts">Contacts</a></li>	
        @role('registered')
        <li><a href="" class="submenu-link">
          {{ Auth::user()->nickname }} 
          <div class="avatar">
            <img class="img-responsive" 
                    style="display:inline-block" 
                    src="/uploads/avatars/{{ Auth::user()->avatar }}" 
                    alt="avatar">
          </div>
        </a>
          <ul class="submenu">
              <li><a href="/profile"><i class="fas fa-users-cog"></i> Profile</a></li>
              <li><a href="/home"><i class="far fa-file-alt"></i> My Posts</a></li>
              <li><a href="/posts/create"><i class="fas fa-pencil-alt"></i> Create new post</a></li>
              <li><a href="/user/edit/{{ Auth::user()->nickname }}"><i class="fas fa-user-edit"></i> Edit profile</a></li>
              @role('admin')
                <li><a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
              @endrole()
              <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>
        </li>
        @endrole
        							
      </ul>
      <script type="text/javascript" src="/js/responsive-nav.js"></script>
      </div>							
      <div class="clearfix"> </div>
      <!----//End-top-nav---->
    </div>
  </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<!----//End-header---->