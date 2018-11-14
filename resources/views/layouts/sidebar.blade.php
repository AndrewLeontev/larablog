<div class="col-md-3 sidebar">
      <div class="search">
       <form method="GET" action="/search">
          @csrf
        <input type="text" name="search" id="search" value="Search..." onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
        <input type="submit" value="">
       </form>
     </div>
     <img src="/images/2.jpg" class="img-responsive" alt=""/>
     <ul class="blog-list">
        <h3>Categories</h3>
        <li><a href="/categories/web%20design">Web Design</a></li>
        <li><a href="/categories/web%20development">Web Development</a></li>
        <li><a href="/categories/technologies">Technologies</a></li>
        <li><a href="/categories/travel">Travel</a></li>
     </ul>
     {{-- <ul class="blog-list1">
        <h3>Tags</h3>
        <li><a href="#">Web Design</a></li>
        <li><a href="#">Html5</a></li>
        <li><a href="#">Wordpress</a></li>
        <li><a href="#">Logo</a></li>
        <li><a href="#">Web Design</a></li>
        <li><a href="#">Web Design</a></li>
        <li><a href="#">Wordpress</a></li>
        <li><a href="#">Web Design</a></li>
        <li><a href="#">Html5</a></li>
        <li><a href="#">Wordpress</a></li>
        <li><a href="#">Logo</a></li>
     </ul> --}}
     <div class="blog_list2">
      <h3>Recent Posts</h3>
      @include ('layouts.recent')
     </div>
   </div>
 <div class="clearfix"> </div>
