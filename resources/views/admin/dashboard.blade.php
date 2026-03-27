<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/pages/adminDashboard.css', 'resources/css/assets/RemixIcon/fonts/remixicon.css', 'resource/js/app.js'])
    <title>Lam's Dashboard</title>
</head>

<body>
    <nav class="navbar">
        <div class="menu">
            <div class="title">Lam's</div>
            <div class="nav-link">
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.borrows') }}"
                    class="{{ Route::is('admin.borrows') ? 'active' : '' }}">Peminjaman</a>
                <a href="{{ route('admin.books') }}" class="{{ Route::is('admin.books') ? 'active' : '' }}">Buku</a>
                <a href="{{ route('admin.categories') }}"
                    class="{{ Route::is('admin.categories') ? 'active' : '' }}">Kategori</a>
                <a href="{{ route('admin.users') }}" class="{{ Route::is('admin.users') ? 'active' : '' }}">Pengguna</a>
            </div>
        </div>

        <div class="profile">
            <span class="name">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" value="Logout">
            </form>
        </div>
    </nav>


    <div class="layout">
        <div class="">
            <div class="banner">
                <div class="hello">Good Evening</div>
                <div class="caption">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime modi molestiae
                    dolor. Voluptate sed, culpa necessitatibus recusandae quo omnis praesentium magnam nisi? Cumque
                    earum natus, quaerat voluptas atque aspernatur ipsum.</div>
            </div>

            <div class="table">
                <h2>Top Book</h2>
                <table>
                    <tr>
                        <td>01</td>
                        <td><img src="" alt=""></td>
                        <td>title</td>
                        <td>borrowed 152</td>
                        <td>rating count</td>
                        <td>rating value</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td><img src="" alt=""></td>
                        <td>title</td>
                        <td>borrowed 152</td>
                        <td>rating count</td>
                        <td>rating value</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td><img src="" alt=""></td>
                        <td>title</td>
                        <td>borrowed 152</td>
                        <td>rating count</td>
                        <td>rating value</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td><img src="" alt=""></td>
                        <td>title</td>
                        <td>borrowed 152</td>
                        <td>rating count</td>
                        <td>rating value</td>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td><img src="" alt=""></td>
                        <td>title</td>
                        <td>borrowed 152</td>
                        <td>rating count</td>
                        <td>rating value</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="">
            <div class="">
                <div class="list-box">jumlah transaksi</div>
                <div class="list-box">permintaan pending pinjam</div>
                <div class="list-box">permintaan pending pengembalian</div>
            </div>

            <div class="">
                rating terbaru
            </div>
        </div>
    </div>
</body>

</html>
