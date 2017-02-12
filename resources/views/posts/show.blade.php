@extends('layout')

@section('content')
	@if(session('success'))
		<div class="notification is-success">
	        Success upload
	    </div>
	@endif

	<div class="columns">
		

		<div class="column is-three-quarters">
	        <article class="media">
			  <div class="media-content">
			    <div class="content">
			      <p>
			        <strong>{{ $post->user->username }}</strong> <small>{{ $post->created_at->diffForHumans() }}</small>
			        <br>
			        <figure class="image is-480x480">
					  <img src="/images/app/{{ $post->image_url }}">
					</figure>
			      </p>
			      <small><a>Like {{ $post->votes }}</a> · <a>Reply</a> · 3 hrs</small>
			    </div>
			    
			  </div>
			</article>

			<hr>
			<div class="comments">
				<h1>Comments</h1>

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
					        <strong>{{ $comment->user->username }}</strong> <small>{{ $post->created_at->diffForHumans() }}</small>
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

@endsection