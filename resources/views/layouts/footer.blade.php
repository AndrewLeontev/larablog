<div class="footer">
    <div class="container">

      <div class="col-md-3 footer_grid">
        <img src="/images/f_logo.png" alt=""/>
            <p>Simple blog system on Laravel by Andrey Leontev</p>
            <ul class="footer_links">
              <li><a href="/about">Read More</a></li>
              <li><a href="/about">About Us</a></li>
            </ul>
            <ul class="footer_social">
              <li><a href="https://github.com/andrewleontev" target="_blank"> <i class="gh"> </i> </a></li>
              <li><a href="https://twitter.com/rebornordontcry" target="_blank"><i class="tw"> </i> </a></li>
              <li><a href=""><i class="db"> </i> </a></li>
            </ul>
        <div class="copy">
          <p>&copy; 2018 Template by <a href="https://leontevblog.ru" target="_blank"> Andrey Leontev</a> and <a href="https://w3layouts.com" target="_blank"> w3layouts</a></p>
        </div>
      </div>
        
      @include ('layouts.footlatest')

      <div class="col-md-3 footer_grid1">
        <h3>Tags</h3>
        <ul class="tags_links">
          @foreach ($tags as $tag)
            <li><a href="/posts/tags/{{ $tag }}">{{ $tag }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
</div>