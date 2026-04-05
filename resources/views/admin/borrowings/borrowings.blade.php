@extends('layouts')

@section('title', "Lam's Pinjam")

@section('content')

    <main>

        <header class="flex justify-center align-center w-100 min-vh-15">

            <form action="" method="post">
                @csrf

                <div class="flex justify-center align-center gap-4">
                    <div class="flex align-center w-100">
                        <input type="text" name="search" id="" placeholder="Cari" class="input-search w-100">
                        <button type="submit" class="btn-primary w-max">Cari</button>
                    </div>

                    <select name="filter" id="" class="select-search">
                        <option value="filter" class="option-search">Filter</option>
                        <option value="filter" class="option-search">Filter</option>
                    </select>
                </div>
            </form>

        </header>

        <section>
            <div class="pt-4 pb-6 grid grid-col-2 gap-4">
                <div class="table-container w-100 radius-md pt-3 pb-4 shadow-xs">
                    <span class="text-md block mb-3 pl-4 pr-4 text-bold color-500">Peminjaman</span>
                    <table class="w-100 radius-md">
                        @if ($borrowings->isEmpty())
                            <tr>
                                <div class="text-center color-700 p-4">Tidak ada data</div>
                            </tr>
                        @else
                            <tr class="color-600 text-sm">
                                <th>Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Request Date</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($borrowings as $b)
                                <tr>
                                    <td>{{ $b->user->name }}</td>
                                    <td>Borrowing</td>
                                    <td>{{ $b->status }}</td>
                                    <td>{{ $b->borrow_date }}</td>
                                    <td>
                                        <form action="{{ route('admin.borrowings.confirm', $b->id) }}" method="post">
                                            @csrf
                                            @method('PUT')

                                            <button type="submit">Konfirmasi</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>

                <div class="table-container w-100 radius-md pt-3 pb-4 shadow-xs">
                    <span class="text-md block mb-3 pl-4 pr-4 text-bold color-500">Pengembalian</span>
                    <table class="w-100 radius-md">
                        @if ($returning->isEmpty())
                            <tr>
                                <div class="text-center color-700 p-4">Tidak ada data</div>
                            </tr>
                        @else
                            <tr class="color-600 text-sm">
                                <th>Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Request Date</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($returning as $r)
                                <tr>
                                    <td>{{ $r->user->name }}</td>
                                    <td>Borrowing</td>
                                    <td>{{ $r->status }}</td>
                                    <td>{{ $r->borrow_date }}</td>
                                    <td>
                                        <form action="{{ route('admin.borrowings.returned', $r->id) }}" method="post">
                                            @csrf
                                            @method('PUT')

                                            <button type="submit">Konfirmasi</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </section>

    </main>

@endsection
