@extends('layout')

@section('content')
	<div class="columns">
		<div class="column is-three-quarters">

			@foreach($posts as $post)
			    <article class="media">
				  <div class="media-content">
				    <div class="content">
				      <p>
				        <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
				        <br>
				        <figure class="image is-480x480">
						  <img src="{{ $post->image_url }}">
						</figure>
				      </p>
				      <small><a>Like</a> · <a>Reply</a> · 3 hrs</small>
				    </div>
				    
				  </div>
				</article>
			@endforeach
		</div>

		<div class="column">
			<p>Second column</p>
		</div>
	</div>

@endsection
