<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        @auth('web')
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route("index") }}" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="{{ route("note_create") }}" class="nav-link px-2 link-secondary">Note create</a></li>
            <li><a href="{{ route("notes") }}" class="nav-link px-2 link-dark">Notes</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">
                <a href="{{ route('logout') }}">Logout</a>
            </button>
        </div>
        @endauth

        @guest('web')
            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2">
                    <a href="{{ route('login') }}">Login</a>
                </button>
                <button type="button" class="btn btn-outline-primary me-2">
                    <a href="{{ route('register') }}">Registration</a>
                </button>
            </div>
        @endguest
    </header>
</div>
