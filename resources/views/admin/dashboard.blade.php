<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/css/pages/adminDashboard.css', 'resources/css/assets/RemixIcon/fonts/remixicon.css', 'resources/js/app.js'])
    <title>Lam's Dashboard</title>
</head>

<body>
    @include('components.navbar')


    <div class="admin-layout">
        <div class="">
            <div class="admin-banner shadow-xs">
                <div class="hello">Good Evening</div>
                <div class="caption">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime modi molestiae
                    dolor. Voluptate sed, culpa necessitatibus recusandae quo omnis praesentium magnam nisi? Cumque
                    earum natus, quaerat voluptas atque aspernatur ipsum.</div>
            </div>

            <div class="admin-table shadow-xs">
                <div class="menu-table">
                    <span class="table-title">Top Book</span>
                    <a href="{{route('admin.books')}}" class="menu-link">View All</a>
                </div>
                <table>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($books as $b)
                        <tr>
                            <td>0{{ $no++ }}</td>
                            <td><img src="" alt=""></td>
                            <td><a href="{{route('admin.detailBook', $b->id)}}" class="color-secondary">{{$b->title}}</a></td>
                            <td>borrowed 152</td>
                            <td>rating count</td>
                            <td>rating value</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="">
            <div class="">
                <div class="admin-list-box shadow-xs">jumlah transaksi</div>
                <div class="admin-list-box shadow-xs">permintaan pending pinjam</div>
                <div class="admin-list-box shadow-xs">permintaan pending pengembalian</div>
            </div>

            <div class="">
                rating terbaru
            </div>
        </div>
    </div>
</body>

</html>
