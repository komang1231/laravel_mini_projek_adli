<nav class="navbar navbar-expand bg-white shadow-sm px-4">

    <div class="container-fluid p-0">

        <div class="d-flex align-items-center gap-3">

            <!-- Hamburger -->
            <button id="sidebarToggle" class="btn btn-light border">

                <i class="bi bi-list fs-4"></i>

            </button>

            <!-- Search -->
            {{-- <div class="position-relative">

                <i class="bi bi-search search-icon"></i>

                <input type="text" class="form-control search-input" placeholder="Cari data...">

            </div> --}}

        </div>

        <div class="d-flex align-items-center gap-3">
            {{-- @guest
                <a href="{{ route('login') }}" class="btn btn-light">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
                <a href="{{ route('register') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus"></i>
                    <span>Register</span>
                </a>
            @endguest

            @auth --}}


            <!-- Notification -->
            <button class="btn btn-light position-relative">

                <i class="bi bi-bell fs-5"></i>

                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99
                </span>

            </button>

            <!-- Profile -->
            <div class="dropdown">

                <button class="btn btn-light dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">

                    <i class="bi bi-person-circle fs-4"></i>

                    <span>Adli</span>

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item" href="{{ route('profile') }}">

                            <i class="bi bi-person-circle me-2"></i>

                            Profile

                        </a>
                    </li>

                    {{-- <a class="dropdown-item text-danger" href="#">
                        Logout
                    </a> --}}

                    {{-- <li>

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button type="submit"
                                class="nav-link border-0 bg-transparent w-100 d-flex align-items-center text-danger">



                                <span class="menu-text">Logout</span>

                            </button>

                        </form>

                    </li> --}}

                </ul>
                {{-- @endauth --}}
            </div>


        </div>

    </div>

</nav>
