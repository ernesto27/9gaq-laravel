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
			    </div>
			    <nav class="level">
			    	<p>Show icons</p>
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
		</div>

		<div class="column">
			<p>Second column</p>
		</div>
	</div>

@endsection
