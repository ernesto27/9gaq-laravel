@extends('layout')

@section('content')
	<div class="columns">
			<div class="column is-three-quarters">
	        <article class="media">
			  <div class="media-content">
			    <div class="content">
			      <p>
			        <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
			        <br>
			        <figure class="image is-480x480">
					  <img src="http://bulma.io/images/placeholders/480x480.png">
					</figure>
			      </p>
			      <small><a>Like</a> · <a>Reply</a> · 3 hrs</small>
			    </div>
			    
			  </div>
			</article>

			<hr>
			<div class="comments">
				<h1>Comments</h1>
				<article class="media">
				  <figure class="media-left">
				    <p class="image is-64x64">
				      <img src="http://bulma.io/images/placeholders/128x128.png">
				    </p>
				  </figure>
				  <div class="media-content">
				    <div class="content">
				      <p>
				        <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
				        <br>
				        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
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
				  <div class="media-right">
				    <button class="delete"></button>
				  </div>
				</article>
				<article class="media">
				  <figure class="media-left">
				    <p class="image is-64x64">
				      <img src="http://bulma.io/images/placeholders/128x128.png">
				    </p>
				  </figure>
				  <div class="media-content">
				    <div class="content">
				      <p>
				        <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
				        <br>
				        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
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
				  <div class="media-right">
				    <button class="delete"></button>
				  </div>
				</article>
			</div>

		</div>

		<div class="column">
			<p>Second column</p>
		</div>

	</div>

@endsection