<article class="media">
  <div class="media-content">
    <div class="content">
      <p>
        <strong>{{ $post->user->username }}</strong> <small>{{ $post->created_at->diffForHumans() }}</small>
        <br>
        <h1 class="title">{{ $post->title }}</h1>
        <figure class="image is-480x480">
          <a href="/posts/{{ $post->id }}">
		  	<img src={{ Storage::disk('s3')->url("{$post->image_url}") }}>
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