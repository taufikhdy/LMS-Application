<nav class="navbar">
    <div class="menu">
        @if (Auth::user()->role->name === 'admin')
            <a href="{{route('admin.dashboard')}}" class="title">Lam's</a>
            <div class="nav-link">
                <a href="{{ route('admin.dashboard') }}" class="{{Route::is('admin.dashboard') ? 'active' : ''}}">Dashboard</a>
                <a href="{{ route('admin.borrows') }}" class="{{Route::is('admin.borrows') ? 'active' : ''}}">Peminjaman</a>
                <a href="{{ route('admin.books') }}" class="{{Route::is('admin.books') ? 'active' : ''}}">Buku</a>
                <a href="{{ route('admin.categories') }}" class="{{Route::is('admin.categories') ? 'active' : ''}}">Kategori</a>
                <a href="{{ route('admin.users') }}" class="{{Route::is('admin.users') ? 'active' : ''}}">Pengguna</a>

        @elseif (Auth::user()->role->name === 'user')
                <a href="{{route('admin.dashboard')}}" class="title">Lam's</a>
            <div class="nav-link">
                <a href="{{ route('user.dashboard') }}" class="{{Route::is('user.dashboard') ? 'active' : ''}}">Dashboard</a>
                <a href="{{ route('user.borrows') }}" class="{{Route::is('user.borrows') ? 'active' : ''}}">Peminjaman</a>
                {{-- <a href="{{ route('user.books') }}" class="{{Route::is('user.books') ? 'active' : ''}}">Buku</a> --}}
                {{-- <a href="{{ route('user.categories') }}" class="{{Route::is('user.categories') ? 'active' : ''}}">Kategori</a> --}}
                <a href="{{ route('user.cart') }}" class="{{Route::is('user.cart') ? 'active' : ''}}">Keranjang</a>
                @endif
            </div>
    </div>

    <div class="profile">
        <span class="name">{{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="text-md" onclick="return confirm('Yakin ingin keluar dari akun ini')"><i class="ri-logout-box-r-line"></i>Logout</button>
        </form>
    </div>
</nav>
