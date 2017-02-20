@extends('layout')

@section('content')
	@if(session('success'))
		<div class="notification is-success">
	        Success upload
	    </div>
	@endif

	<div class="columns">
		

		<div class="column is-three-quarters">
	        @include('elements.post_item')
			<hr>
			<div class="comments">
				<h1>Comments</h1>

				<div class="add-comment">

					@if (count($errors) > 0)
					    <div class="notification is-danger">
					        <ul>
					        	<li>Error</li>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

					@if(session('success-comment'))
						<div class="notification is-success">
					        Comment added!
					    </div>
					@endif

					@if(Auth::check())
						<form action="/comments" method="post" class="form-comment">
							{{ csrf_field() }}
							<input type="hidden" name="post_id" value="{{ $post->id }}">
							<input type="hidden" name="parent_id" value="0">
							<label class="label">Tu comentario</label>
							<p class="control">
							  <textarea class="textarea" placeholder="Textarea" name="comment"></textarea>
							</p>

							<p class="control">
								<button class="button is-primary btn-comment">Enviar</button>
							</p>
						</form>
					@endif
				</div>

				<hr>

				@foreach($comments as $comment)
					@if($comment->parent_id == 0)
						@include('elements.comment_item', ['comment' => $comment, 'className' => ''])
						
						@foreach($comment->children as $commentChildren)
							@include('elements.comment_item', ['comment' => $commentChildren, 'className' => 'comment-child'])
						@endforeach
					@endif
				@endforeach

				@unless(empty($comments))
					<p>No hay comentarios para este post</p>
				@endunless

			</div>

		</div>

		<div class="column">
			<p>Second column</p>
		</div>

	</div>
	<hr><hr>
@endsection