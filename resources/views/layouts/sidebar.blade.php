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
        @foreach ($categories as $category)
        <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
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
