<nav class="navbar navbar-expand-lg bg-white sticky-top shadow-sm">
    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand d-flex align-items-center gap-2 fw-bold">
            <img src="{{ url('assets/images/logo.png') }}" alt="">
            <div>
                <p class="mb-0 fs-7" style="line-height: 15px;">
                    Ware <br> <span class="text-primary">House</span>
                </p>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto gap-0 gap-md-2">
                @if (Auth::user()->roles == 'Admin')
                    <li class="nav-item">
                        <a wire:navigate href="{{ route('admin.dashboard') }}" class="nav-link {{ $active === 'dashboard' ? 'active' : '' }}">
                            <i class="bx bxs-dashboard"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ $active === 'kategori' || $active === 'produk' ? 'active' : '' }}" data-bs-toggle="dropdown">
                            <i class="bx bx-box"></i> Inventaris
                        </a>

                        <ul class="dropdown-menu mt-2">
                            <li>
                                <a wire:navigate href="{{ route('admin.kategori') }}" class="dropdown-item {{ $active === 'kategori' ? 'active' : '' }}">
                                    <i class="bx bx-objects-horizontal-right"></i> Kategori Produk
                                </a>
                            </li>
                            <li>
                                <a wire:navigate href="{{ route('admin.produk') }}" class="dropdown-item {{ $active === 'produk' ? 'active' : '' }}">
                                    <i class="bx bx-box"></i> Produk
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate href="{{ route('admin.staff') }}" class="nav-link {{ $active === 'staff' ? 'active' : '' }}">
                            <i class='bx bx-user-pin'></i> Staff
                        </a>
                    </li>
                    
                @else
                    <li class="nav-item">
                        <a wire:navigate href="{{ route('staff.dashboard') }}" class="nav-link {{ $active === 'dashboard' ? 'active' : '' }}">
                            <i class="bx bxs-dashboard"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate href="{{ route('staff.transaksi') }}" class="nav-link {{ $active === 'transaksi' ? 'active' : '' }}">
                            <i class='bx bx-line-chart'></i> Transaksi
                        </a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="rounded-circle" width="36"
                            alt="user image">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>