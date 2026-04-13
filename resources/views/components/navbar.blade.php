<nav class="navbar">
    <div class="menu">
        @if (Auth::user()->role->name === 'admin')
            <a href="{{route('admin.dashboard')}}" class="title">Lam's</a>
            <div class="nav-link">
                <a href="{{ route('admin.dashboard') }}" class="{{request()->is('dashboard*') ? 'active' : ''}}">Dashboard</a>
                <a href="{{ route('admin.borrows') }}" class="{{request()->is('borrow*') ? 'active' : ''}}">Peminjaman</a>
                <a href="{{ route('admin.fines') }}" class="{{request()->is('fines*') ? 'active' : ''}}">Denda</a>
                <a href="{{ route('admin.books') }}" class="{{request()->is('book*') ? 'active' : ''}}">Buku</a>
                <a href="{{ route('admin.categories') }}" class="{{request()->is('category*') ? 'active' : ''}}">Kategori</a>
                <a href="{{ route('admin.users') }}" class="{{request()->is('user*') ? 'active' : ''}}">Pengguna</a>

        @elseif (Auth::user()->role->name === 'user')
                <a href="{{route('admin.dashboard')}}" class="title">Lam's</a>
            <div class="nav-link">
                <a href="{{ route('user.dashboard') }}" class="{{request()->is('dashboard*') ? 'active' : ''}}">Home</a>
                <a href="{{ route('user.borrows') }}" class="{{request()->is('borrow*') ? 'active' : ''}}">Peminjaman</a>
                <a href="{{ route('user.books') }}" class="{{request()->is('book*') ? 'active' : ''}}">Buku</a>
                {{-- <a href="{{ route('user.categories') }}" class="{{Route::is('user.categories') ? 'active' : ''}}">Kategori</a> --}}
                <a href="{{ route('user.cart') }}" class="{{request()->is('cart*') ? 'active' : ''}}">Keranjang</a>
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
