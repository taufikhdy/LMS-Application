@extends('layouts')

@section('title', "Lam's Pinjam")

@section('content')

    <main>

        <header class="flex justify-center align-center w-100 min-vh-15">

            <form action="{{ route('admin.borrows') }}" method="get">
                <div class="flex justify-center align-center gap-4">
                    <div class="flex align-center w-100">
                        <input type="text" name="search" id="" placeholder="Cari" class="input-search w-100"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn-primary w-max">Cari</button>
                    </div>
                </div>
            </form>

        </header>

        <section>
            <div class="pt-4 pb-6 grid grid-col-2 gap-4">
                <div class="table-container-2 w-100 radius-md pt-3 pb-4 shadow-xs">
                    <span class="text-md block mb-3 pl-4 pr-4 text-bold color-500">Peminjaman</span>
                    <table class="w-100 radius-md">
                        @if ($pending->isEmpty())
                            <tr>
                                <div class="text-center color-700 p-4">Tidak ada data</div>
                            </tr>
                        @else
                            <tr class="color-600 text-sm">
                                <th>Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Request Date</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($pending as $b)
                                <tr>
                                    <td>{{ $b->user->name }}</td>
                                    <td>Borrowing</td>
                                    <td>{{ $b->status }}</td>
                                    <td>{{ $b->borrow_date }}</td>
                                    <td><a href="{{ route('admin.borrowsDetail', $b->id) }}">Detail</a></td>
                                    <td>
                                        <div class="flex align-center justify-center gap-2">
                                            <form action="{{ route('admin.borrowings.confirm', $b->id) }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit" class="btn-success radius-sm pt-1 pb-1"><i
                                                        class="ri-check-line text-md text-bold"></i></button>
                                            </form>

                                            <form action="{{ route('admin.borrowings.reject', $b->id) }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit" class="btn-error radius-sm pt-1 pb-1"><i
                                                        class="ri-close-line text-md text-bold"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>

                <div class="table-container-2 w-100 radius-md pt-3 pb-4 shadow-xs">
                    <span class="text-md block mb-3 pl-4 pr-4 text-bold color-500">Pengembalian</span>
                    <table class="w-100 radius-md">
                        @if ($borrowed->isEmpty())
                            <tr>
                                <div class="text-center color-700 p-4">Tidak ada data</div>
                            </tr>
                        @else
                            <tr class="color-600 text-sm">
                                <th>Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Detail</th>
                                <th>Request Date</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($borrowed as $r)
                                <tr>
                                    <td>{{ $r->user->name }}</td>
                                    <td>Borrowing</td>
                                    <td>{{ $r->status }}</td>
                                    <td><a href="{{ route('admin.borrowsDetail', $r->id) }}">Detail</a></td>
                                    <td>{{ $r->borrow_date }}</td>
                                    <td>
                                        <div class="flex align-center justify-center gap-2">
                                            <form action="{{ route('admin.borrowings.returned', $r->id) }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit" class="btn-success radius-sm pt-1 pb-1"><i
                                                        class="ri-check-line text-md text-bold"></i></button>
                                            </form>
                                        </div>
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
