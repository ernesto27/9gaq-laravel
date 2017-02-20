<article class="media {{ $className }} wrapper-comment">
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

    @if($comment->parent_id == 0)
      <nav class="level">
        <div class="level-left">
          <a class="level-item reply-comment" data-commentid={{ $comment->id }}>
            Reply
          </a>
        </div>
      </nav>
    @endif
  </div>
</article>
<br>



