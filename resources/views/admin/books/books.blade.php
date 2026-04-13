@extends('layouts')

@section('title', "Lam's Books")

@section('content')

    <main>
        <header>
            <div class="flex justify-between align-center w-100 mb-4">
                <h1 class="text-xxl text-bold">Buku</h1>

                <div class="flex align-center gap-2">
                    <form action="{{ route('admin.books') }}" method="get">
                        <div class="flex align-center w-100">
                            <input type="text" name="search" id="" placeholder="Cari" class="input-search w-max"
                                value="{{ request('search') }}">
                            <button type="submit" class="btn-primary w-max">Cari</button>
                        </div>
                    </form>

                    <a href="{{ route('admin.addBook') }}" class="btn-primary radius-sm w-100"><i class="ri-add-fill"></i>
                        Tambah</a>
                </div>
            </div>
        </header>

        <section>
            <div class="table-container-2 w-100 radius-md pt-3 pb-4 shadow-xs">
                <table class="w-100 radius-md">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Dipinjam</th>
                        <th>Menu</th>
                    </tr>

                    @php
                        $no = 1;
                    @endphp

                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><img src="{{asset('storage/' . $book->image)}}" alt="" class="w-20"></td>
                            <td>{{ $book->title }}</td>
                            <td>
                                @foreach ($book->categories as $category)
                                    {{ $category->name . ', ' }}
                                @endforeach
                            </td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->year }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>{{ $book->borrow_details_count }}</td>
                            <td>
                                <div class="flex justify-center align-center gap-4">
                                    <a href="{{ route('admin.detailBook', $book->id) }}"><i
                                            class="ri-eye-line text-lg color-primary"></i></a>
                                    <a href="{{ route('admin.editBook', $book->id) }}"><i
                                            class="ri-edit-line text-lg color-warning"></i></a>
                                    <form action="{{ route('admin.deleteBook', $book->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i
                                                class="ri-delete-bin-line text-lg color-error"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </section>
    </main>
@endsection
