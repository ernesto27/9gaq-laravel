@extends('layout')

@section('content')

	@if(session('message'))
		<div class="notification is-primary">
			 <button class="delete"></button>
			  {{ session('message') }}
		</div>
	@endif

	<div class="columns">

		<div class="column is-three-quarters">

			@foreach($posts as $post)
			    <article class="media">
				  <div class="media-content">
				    <div class="content">
				      <p>
				        <strong>{{ $post->user->username }}</strong> <small>{{ $post->created_at->diffForHumans() }}</small>
				        <br>
				        <figure class="image is-480x480">
				          <a href="/posts/{{ $post->id }}">
						  	<img src="/images/app/{{ $post->image_url }}">
						  </a>
						</figure>
				      </p>
				      <form action="/post/vote" method="post">
				      	<input type="hidden" name="post_id" value="{{ $post->id }}">
				      	<a>Like {{ $post->votes }}</a> 
				      	<input type="submit" name="send">
				      </form>
				      <a>Reply</a>
				    </div>
				    
				  </div>
				</article>
			@endforeach
		</div>

		<div class="column">
			<p>Second column</p>
		</div>
	</div>

	<div>
		
		{{ $posts->links() }}
	</div>

	<hr>

@endsection
