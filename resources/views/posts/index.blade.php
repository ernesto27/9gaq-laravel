@extends('layout')

@section('content')
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
						  	<img src="{{ $post->image_url }}">
						  </a>
						</figure>
				      </p>
				      <small><a>Like {{ $post->votes }}</a> · <a>Reply</a></small>
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
