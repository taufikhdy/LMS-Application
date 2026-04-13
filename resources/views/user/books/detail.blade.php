@extends('layouts')

@section('title', 'Detail Buku')

@section('content')

    <main>

        <span class="flex mb-4">
            <a href="{{ route('user.dashboard') }}">Home</a>/
            <a href="{{ route('user.books') }}">Buku</a>/
            <a href="{{ route('user.bookDetail', $book->id) }}" class="text-bold color-primary">{{ $book->title }}</a>
        </span>

        <div class="book-detail">
            <div class="">
                <img src="{{asset('storage/' . $book->image)}}" alt="" class="">
            </div>

            <div class="">
                <span class="block text-xl text-bold">{{ $book->title }}</span>
                <span class="block mt-1">Penulis : {{ $book->author }}</span>
                <span class="block mt-1 text-bold">Stok : {{ $book->stock }}</span>

                <span class="block mt-3">{!! nl2br(e($book->description)) !!}</span>

                <div class="mt-3 text-right">
                    <form action="{{ route('user.addToCart', $book->id) }}">
                        @csrf
                        <button type="submit" class="btn-primary">Tambah</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="mt-4">
            <table class="general-table">
                <tr>
                    <td>Judul Buku</td>
                    <td>{{ $book->title }}</td>
                </tr>
                <tr>
                    <td>Kategori Buku</td>
                    <td>
                        @foreach ($book->categories as $category)
                            {{ $category->name . ', ' }}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td>{{ $book->author }}</td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td>{{ $book->year }}</td>
                </tr>
            </table>
        </div>

    </main>

@endsection
