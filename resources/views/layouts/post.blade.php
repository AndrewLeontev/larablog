
				<div class="blog_left post_show post_index">
					<div class="row">

						<div class="post-img col-sm-3">
								<div class="post-poster" >
										<img src="/uploads/posts/{{ $post->post_image }}" alt="" class="image-responsive">
								</div>
						</div>
						<div class="col-sm-9">
							<div class="post-head">
									<h2 class="head"><a href="/posts/{{ strtolower($post->slug) }}">{{ $post->title }}</a></h2>
									<h3 class="info">Posted {{ $post->created_at->diffForHumans() }} in <a href="/categories/{{ $post->category->name }}">{{ $post->category->name }}</a> By <a href="/users/{{ $post->user->nickname }}">{{ $post->user->nickname }}</a>.</h3>
									<div class="btn-post">
									
										@if (Auth::check() && Auth::user() == $post->user()->first())
											<a id="btn-tooltip" title="Delete post" href="#"><i data-dialog="somedialog"  class="fas fa-trash-alt trigger"></i></a>
											<a id="btn-tooltip" title="Edit post" href="/posts/{{ $post->slug }}/edit"><i class="fas fa-edit"></i></a>
										@endif
									</div>
							</div>
							
							<div id="post-prev">
								<div class="post-body">
									{!! 
										str_replace('<img', '<img class="img-responsive" style="max-width: 100%"', Markdown::convertToHtml(
											e($post->body)
										))
									!!}
								</div>
							</div>
							
							<h3 class="comment-info">Comments: <a href="/posts/{{ strtolower($post->slug) }}#comments">{{ count($post->comments) }}</a></h3>
							
							@include ('post.tags')
						</div>
					</div>
				</div>
				<div id="dialogEffects" class="sally">
						<div id="somedialog" class="dialog">
							<div class="dialog__overlay"></div>
							<div class="dialog__content">
								<h2><strong>Do you really want to delete this post?</h2>
								<div><button class="action" ><a href="/posts/{{ $post->id }}/delete">Yes</a></button>
								<button class="action" data-dialog-close="">Close</button></div>
							</div>
						</div>
					</div>
			

    <script  src="/js/modal.js"></script>
