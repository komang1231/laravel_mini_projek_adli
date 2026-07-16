<aside id="sidebar" class="sidebar d-flex flex-column">

    <!-- Logo -->
    <div class="sidebar-header d-flex align-items-center gap-2 p-4">

        <i class="bi bi-box-seam-fill fs-3"></i>

        <span class="logo-text fw-bold fs-5">
            Inventory
        </span>

    </div>

    <hr class="text-white opacity-25 my-0">

    <!-- Menu -->
    <ul class="nav flex-column px-3 py-3 flex-grow-1">

        @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link d-flex align-items-center">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span class="menu-text">Login</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link d-flex align-items-center">
                    <i class="bi bi-person-plus"></i>
                    <span class="menu-text">Register</span>
                </a>
            </li>

        @endguest
        @auth

            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link active d-flex align-items-center">
                    <i class="bi bi-house"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('barangs.index') }}" class="nav-link d-flex align-items-center">
                    <i class="bi bi-box"></i>
                    <span class="menu-text">Barang</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kategoris.index') }}" class="nav-link d-flex align-items-center">
                    <i class="bi bi-tags"></i>
                    <span class="menu-text">Kategori</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link d-flex align-items-center">
                    <i class="bi bi-people"></i>
                    <span class="menu-text">User</span>
                </a>
            </li>

        </ul>

        <hr class="text-white opacity-25 my-0">

        <ul class="nav flex-column px-3 py-3">

            <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center">
                    <i class="bi bi-gear"></i>
                    <span class="menu-text">Pengaturan</span>
                </a>
            </li>

            <li class="nav-item">

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit"
                        class="nav-link border-0 bg-transparent w-100 d-flex align-items-center text-danger">

                        <i class="bi bi-box-arrow-right"></i>

                        <span class="menu-text">Logout</span>

                    </button>

                </form>

            </li>
        @endauth
    </ul>

</aside>
