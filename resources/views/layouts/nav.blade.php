<!----start-header---->
<div class="header">
  <div class="container">
    <div class="header_top">
      <div class="logo">
        <a href="/"><img src="/images/logo.png" alt=""></a>
      </div>
      <div class="menu">
      <a class="toggleMenu" href="#"><img src="/images/nav_icon.png" alt="" /> </a>
      <ul class="nav" id="nav">
        <li><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/contacts">Contacts</a></li>	
        @if (Auth::check())
          <li><a href="/home">{{ Auth::user()->name }}</a></li>
        {{-- @else
          <li><a href="/login">Login</a></li>
          <li><a href="/register">Register</a></li> --}}
        @endif
        							
      </ul>
      <script type="text/javascript" src="/js/responsive-nav.js"></script>
      </div>							
      <div class="clearfix"> </div>
      <!----//End-top-nav---->
    </div>
  </div>
</div>
<!----//End-header---->