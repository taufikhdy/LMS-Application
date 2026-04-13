@extends('layouts')

@section('title', 'LMS Book Form')

@section('content')
    <main>
        <div class="flex justify-center p-6">
            <div class="input-layer shadow-xs p-4">
                <form action="" method="post">

                    <div class="text-xl text-bold text-center pt-3 pb-5">Detail Buku</div>

                    <label for="image">Cover Buku</label>
                    <input type="file" name="image" value="{{$book->image}}">

                    <label for="title">Judul Buku</label>
                    <input type="text" name="title" id="title" placeholder="Title" readonly
                        value="{{ $book->title }}">

                    <label for="category">Kategori Buku</label>
                    <table class="general-table">
                        <tr>
                            <th>Kategori</th>
                        </tr>
                        <tr>
                            <td style="background-color: var(--neutral-900)">
                                @foreach ($book->categories as $c)
                                    {{ $c->name }},
                                @endforeach
                            </td>
                        </tr>
                    </table>

                    <label for="author">Penulis</label>
                    <input type="text" name="author" id="author" placeholder="Author" readonly
                        value="{{ $book->author }}">

                    <label for="publisher">Penerbit</label>
                    <input type="text" name="publisher" id="publisher" placeholder="Publisher" readonly
                        value="{{ $book->publisher }}">

                    <label for="year">Tahun Terbit</label>
                    <input type="text" name="year" id="year" placeholder="Year" readonly
                        value="{{ $book->year }}">

                    <label for="stock">Stok</label>
                    <input type="text" name="stock" id="stock" placeholder="Stock" readonly
                        value="{{ $book->stock }}">

                    <label for="desc">Deskripsi</label>
                    <textarea name="description" id="desc" cols="30" rows="8" placeholder="Description" readonly>{{ $book->description }}</textarea>

                    <a href="{{ route('admin.editBook', $book->id) }}"
                        class="btn-warning block text-center w-100 radius-sm"><i class="ri-pen-line"></i> Edit</a>
                </form>
            </div>
        </div>
    </main>

@endsection
