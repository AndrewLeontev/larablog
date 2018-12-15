@extends ('layouts.master')

@section ('content')
	<div class="col-md-9">
		<h2>Search results for: </h2>
		<div class="search col-md-5">
				<form method="GET" action="/search">
						@csrf
					<input type="text" name="search" id="search" value="{{ $searchstr }}" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
					<input type="submit" value="">
				</form>
				
		</div>
		<div class="clearfix"> </div>
		<div class="alert alert-primary" role="alert">Find {{ count($posts) }} results</div>

		<hr>

		@if (count($posts))
			@foreach ($posts as $post)
				@include ('layouts.post')
			@endforeach  
			@role ('registered')
			<div id="dialogEffects" class="sally">
				<div id="somedialog" class="dialog">
					<div class="dialog__overlay"></div>
					<div class="dialog__content">
						<h2><strong>Do you really want to delete this post?</h2>
						<div><button class="action" ><a href="/posts/{{ $post->slug }}/delete">Yes</a></button>
						<button class="action" data-dialog-close="">Close</button></div>
					</div>
				</div>
			</div>
		@endrole
		@else 
			<div class="log_left">
				<h2>
					There are no posts yet
				</h2>
			</div>
		@endif

		@include('layouts.pagination')
		
	</div> 

@endsection