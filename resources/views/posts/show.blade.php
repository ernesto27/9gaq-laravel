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
						<form action="/comments" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="post_id" value="{{ $post->id }}">
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
					<article class="media">
					  <figure class="media-left">
					    <p class="image is-64x64">
					      <img src="http://bulma.io/images/placeholders/128x128.png">
					    </p>
					  </figure>
					  <div class="media-content">
					    <div class="content">
					      <p>
					        <strong>{{ $comment->user->username }}</strong> <small>{{ $comment->created_at->diffForHumans() }}</small>
					        <br>
					        {{ $comment->body }}
					      </p>
					    </div>
					    <nav class="level">
					      <div class="level-left">
					        <a class="level-item">
					          <span class="icon is-small"><i class="fa fa-reply"></i></span>
					        </a>
					        <a class="level-item">
					          <span class="icon is-small"><i class="fa fa-retweet"></i></span>
					        </a>
					        <a class="level-item">
					          <span class="icon is-small"><i class="fa fa-heart"></i></span>
					        </a>
					      </div>
					    </nav>
					  </div>
					</article>
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