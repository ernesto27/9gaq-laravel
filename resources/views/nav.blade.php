
<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item">
        <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
      </a>

    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu">
      
      @if(Auth::check())
        <a class="nav-item is-tab">
          <figure class="image is-16x16" style="margin-right: 8px;">
            <img src="http://bulma.io/images/jgthms.png">
          </figure>
          Upload
        </a>
        <a class="nav-item is-tab" href="/users/logout">Log out</a>
      @else
        <a class="nav-item is-tab" href="/users/register">Register</a>
        <a class="nav-item is-tab" href="/users/login">Login</a>
        
      @endif
    </div>
  </div>
</nav>