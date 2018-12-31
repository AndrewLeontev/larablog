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
        <li><a href="{{ route('users') }}">Users</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/contacts">Contacts</a></li>	
        
        @role('registered')
        <li class="dropdown">
          <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i style="font-size:20px;" class="far fa-bell"> 
              <span id="notify" class="badge badge-light"></span>
            </i>
          </a>
          <div  class="dropdown-menu" aria-labelledby="dropdownMenuButton notificationsMenu" id="notificationsMenu">
              <a class="dropdown-header">No notifications</a>
          </div>
        </li>
        <li><a href="/home" class="submenu-link">
              {{ Auth::user()->nickname }} <i id="icon" class="fas fa-arrow-down"></i> 
            <div class="avatar">
              <img class="img-responsive" 
                      style="display:inline-block" 
                      src="/uploads/avatars/{{ Auth::user()->avatar }}" 
                      alt="avatar">
            </div>
          </a>
          <ul class="submenu">
              <li>
                <a href="/profile">
                  <i class="fas fa-users-cog"></i> Profile <i id="sub" class="fas fa-arrow-left deactive"></i>
                </a>
              </li>

              <li>
                <a href="/home">
                  <i class="far fa-file-alt"></i> My Posts <i id="sub" class="fas fa-arrow-left deactive"></i>
                </a>
              </li>

              <li>
                <a href="/posts/create">
                  <i class="fas fa-pencil-alt"></i> Create new post <i id="sub" class="fas fa-arrow-left deactive"></i>
                </a>
              </li>
              

              @role('admin')
                <li>
                  <a href="/admin">
                    <i class="fas fa-tachometer-alt"></i> Dashboard <i id="sub" class="fas fa-arrow-left deactive"></i>
                  </a>
                </li>
              @endrole()

              <li>
                <a href="/logout">
                  <i class="fas fa-sign-out-alt"></i> Logout <i id="sub" class="fas fa-arrow-left deactive"></i>
                </a>
              </li>
          </ul>
        </li>
        @endrole
        @if (!Auth::check())
          <li>
            <a href="" class="submenu-link">
              Login | Register <i id="icon" class="fas fa-arrow-down "></i> 
            </a>
            <ul class="submenu login">
              <center><h2 class="login-header">Login</h2></center>
              <form action="/login" method="post">
                @csrf
    
                @include ('layouts.errors')
                <li>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input autocomplete="off" type="text" class="form-control" id="email"  name="email">
                </div>
                </li>
          
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password"  name="password">
                </div>
                      
                <button type="submit" class="loginbtn">Sign In</button>
              </form>
              <h2 class="login-bottom" id="subm">New to site? <a href="/register">CREATE ACCOUNT</a> </h2>

            </ul>
          </li>

        @endif
        							
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