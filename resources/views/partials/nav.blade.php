      
<nav>
    <ul class="navbar-banner">
        @guest
        <li><a href="{{ route('login') }}">Login</a></li>

        @else
        <li><a href="{{ route('posts.index') }}">List of Posts</a></li>
        <li><a href="{{ route('posts.user') }}">My Posts</a></li>
        <li><a href="{{ route('posts.create') }}">Create new Post</a></li>
        <li><a href="{{ route('categories.index') }}">List of Categories</a></li>


        <form id="toggle-premium-form" action="{{ route('user.togglePremiumStatus') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            {{ Auth::user()->is_premium ? 'Turn Premium Off' : 'Turn Premium On' }}
                                        </button>
                                    </form>


        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </ul>
</nav>
