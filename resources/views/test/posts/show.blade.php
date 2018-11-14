@extends ('layouts.master')

@section ('content')
<div class="col-md-9">
    <div class="blog_left single_left">
        
        <h2>{{ $post->title }}</h2>
        <h3>Posted {{ $post->created_at }} in {{ $post->categories }} By <a href="#">Admin</a>.</h3>
        <p>{{ $post->body }}</p>
    </div>

    <h3>Comments:</h3>
    <ul class="list">
            <li>
                <div class="preview"><a href="#"><img src="images/blog_s4.jpg" class="img-responsive" alt=""/></a></div>
                <div class="data">
                    <div class="title">Feb 3,2015  /  posted by Suffered <a href="#">reply</a></div>
                    <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. qui sequitur mutationem consuetudium lectorum.,</p>
                </div>
            <div class="clearfix"></div>
            </li>
            <li class="middle">
                <div class="preview1"><a href="#"><img src="images/blog_s4.jpg" class="img-responsive" alt=""/></a></div>
                <div class="data-middle">
                <div class="title">Feb 3,2015  /  posted by Suffered <a href="#">reply</a></div>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum Mirum est notare quam littera gothica, quam nunc putamus parum</p>
                </div>
                <div class="clearfix"></div>
            </li>
        </ul>
        <div class="single_contact">
            <h1>Leave Reply</h1>
            <form>
            <div class="column_2">
                <input type="text" class="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
                <input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" style="margin-left:2.7%">
                <input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" style="margin-left:2.7%">
            </div>
            <div class="column_3">
            <textarea value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message:</textarea>
            </div>
            <div class="form-submit1">
            <label class="btn btn-primary btn-normal btn-inline " target="_self"><input type="submit" value="Submit Comment"></label>
            </div>
            <div class="clearfix"> </div>
        </form>
    </div>
</div>  
@endsection