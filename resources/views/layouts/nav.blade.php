<div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="#">Home</a>
          <a class="nav-link" href="#">New features</a>
          @if(Auth::check())
          <a class="nav-link" href="/posts">All Posts</a>
          
          <a class="nav-link" href="/posts/create">Add Post</a>
          @endif
          
          @if(Auth::check())
          <a class="nav-link ml-auto" href="javascript:void(0)">{{ Auth::user()->name }}</a>
          <a class="nav-link" href="/logout">Logout</a>
          @endif
          
          @if(!Auth::check())
          <a class="nav-link ml-auto" href="/login">Login</a>
          <a class="nav-link" href="/register">Register</a>
          @endif
        </nav>
      </div>
    </div>