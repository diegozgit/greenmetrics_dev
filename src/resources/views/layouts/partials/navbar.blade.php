<header class="p-3 bg-success text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-sm-end">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                <li><a href="{{ route('home.index') }}" class="nav-link px-2 text-white">Home</a></li>
            </ul>

            @auth('web')
                <div class="text-end justify-content-end">
                    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
            @endauth

            @auth('admin')
                <div class="text-end justify-content-end">
                    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
            @endauth

            @auth('supplier')
                <div class="text-end justify-content-end">
                    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
            @endauth

            @if (!Auth::guard('web')->check() && !Auth::guard('admin')->check() && !Auth::guard('supplier')->check())
                @guest
                    <div class="text-end">
                        <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                        <a href="{{ route('register.perform') }}" class="btn btn-light">Registrati</a>
                        <a href="{{ route('registerAdmin.perform') }}" class="btn btn-light">Admin</a>
                    </div>
                @endguest
            @endif
        </div>
    </div>
</header>
