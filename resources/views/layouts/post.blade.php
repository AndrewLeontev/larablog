
 @include ('layouts.modal')

		<article class="post-block wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
				<div class="post-holder">
					<div class="img-holder">
						<a href="/posts/{{ $post->slug }}"><img src="/uploads/posts/{{ $post->post_image }}" alt="post image"></a>
					</div>
					<time datetime=""><a href="/categories/{{ $post->category->name }}">{{ $post->created_at->format(' jS  F ') }} - {{ $post->category->name }}</a></time>
					
					<h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
					<div id="post-prev" style="height: 175px;">
						<div class="post-body" style="height: 175px;">
							<p>{{ substr($post->body, 0, 255)}}...</p>
						</div>
					</div>
					<a href="/posts/{{ $post->slug }}" class="read-more">Read more</a>
					<footer>
						<strong class="text comment-count"><span style="volor: white;" class="icon ico-comment"></span><a href="/posts/{{ $post->slug }}#comments">{{ count($post->comments)}} comments</a></strong>
						@role ('registered')
							@if (Auth::user()->id == $post->user()->first()->id)
								<strong class="text" style="float:right">
									<a style="font-size:16px" title="Edit post" href="/posts/{{ $post->slug }}/edit"><i class="fas fa-edit"></i></a>
									<a style="font-size:16px; display: inline; float: right" data-toggle="dataTable" data-form="deleteForm">
												{!! Form::model($post, ['method' => 'delete', 'route' => ['posts.destroy', $post->slug], 'class' =>'form-inline form-delete']) !!}
												{!! Form::hidden('slug', $post->slug) !!}
												<i  class="fas fa-trash-alt">
													{!! Form::submit(trans(""), ['class' => 'btn btn-xs btn-danger delete', 'id' => 'none-display', 'name' => 'delete_modal']) !!}
												</i>
												{!! Form::close() !!}
									</a>
								</strong>
							@endif
						@endrole
					</footer>
				</div>
		</article>


		<script  src="/js/modal.js"></script>
