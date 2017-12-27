<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'DipCiti') }}
      </a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="{{Request::is('/') ? "active" : ""}}"><a href="/">Welcome</a></li>
        <li class="{{Request::is('about') ? "active" : ""}}"><a href="/about">About</a></li>
        <li class="{{Request::is('contact') ? "active" : ""}}"><a href="/contact">Contact</a></li>
        <li class="{{Request::is('blog') ? "active" : ""}}"><a href="/blog">Blog</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
          @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="{{ route('dashboard') }}">Blog Posts</a></li>
                    <li><a href="{{ route('categories.index') }}">Categories</a></li>
                    <li><a href="{{ route('tags.index') }}">Tags</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>