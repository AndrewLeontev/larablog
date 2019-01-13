<div class="single_contact">
  <h3>Leave Reply</h3>
  
  <form method="POST" action="/posts/{{ $post->slug }}/comments">
      {{ csrf_field() }}

      @include ('layouts.errors')
      
      <div class="column_3">
          <textarea name="body" required id="body" cols="30" rows="10" placeholder="Comment"></textarea>
      </div>
      
      <div class="form-submit1">
          <button class="btn btn-primary btn-normal btn-inline" target="_self" type="submit">Submit</button>
      </div>
      
  </form>
  <div class="clearfix"> </div>
</div>