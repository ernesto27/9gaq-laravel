
<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item" href="/posts">
        <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
      </a>
      <a href="posts?order=latest" class="nav-item is-tab is-hidden-mobile @if($request->get('order') == 'latest') is-active @endif">Latest</a>
      <a href="posts?order=votes" class="nav-item is-tab is-hidden-mobile @if($request->get('order') == 'votes') is-active @endif">More votes</a>
      <a href="#" onClick="return false;" class="nav-item is-tab is-hidden-mobile @if($request->get('category')) is-active @endif">
        <select name="category" class="select-category">
            @foreach($categories as $category)
              <option value="{{ $category->id }}" @if($request->get('category') == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
      </a>


    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu">
      
      @if(Auth::check())
        <a class="nav-item is-tab" href="/posts/create">
          <figure class="image is-24x24" style="margin-right: 8px;">
            <img src={{ Storage::disk('s3')->url("users/avatars/".Auth::user()->id.".jpg") }}>
          </figure>
          Upload
        </a>
        <a class="nav-item is-tab" href="/users/{{ Auth::user()->id }}/edit">Profile</a>
        <a class="nav-item is-tab" href="/users/logout">Log out</a>
      @else
        <a class="nav-item is-tab" href="/users/create">Register</a>
        <a class="nav-item is-tab" href="/users/login">Login</a>
        
      @endif
    </div>
  </div>
</nav>