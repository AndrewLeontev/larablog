@role ('registered')
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
@endrole