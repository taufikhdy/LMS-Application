@extends('layouts')

@section('title', "Lam's Dashboard")

@section('content')

    <header>

        <div class="customer-banner">

        </div>

    </header>

    <main>
        <div class="flex align-end justify-between mb-4">
            <h1 class="text-xxl text-bold">Buku</h1>
            <a href="{{ route('user.books') }}" class="text-sm color-500">Lihat Semua</a>
        </div>

        <div class="grid grid-col-6 gap-4 w-100">
            @foreach ($books as $book)
                <div class="box-item shadow-xs">
                    <a href="{{ route('user.bookDetail', $book->id) }}">
                        <img src="" alt="" class="thumbnail">
                        <div class="info">
                            <div class="title">{{ $book->title }}</div>
                            <div class="author">{{ $book->author }}</div>
                            <div class="rating"></div>
                        </div>
                    </a>
                    <form action="{{ route('user.addToCart', $book->id) }}">
                        @csrf
                        <div class="p-2">
                            <button type="submit" class="btn-primary w-100">Tambah</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>



        {{-- BORROW --}}
        <div class="flex align-end justify-between mt-6 mb-4">
            <h1 class="text-xxl text-bold">Sedang Dipinjam</h1>
            <a href="{{ route('user.borrows') }}" class="text-sm color-500">Lihat Semua</a>
        </div>

        @if ($borrowings->isEmpty())
            <div class="block w-100 text-center color-700 p-6">Anda belum meminjam buku</div>
        @else
            <div class="grid grid-col-6 gap-4 w-100">
                @foreach ($borrowings as $b)
                    @foreach ($b->details as $i)
                        <a href="{{ route('user.borrows') }}" class="box-item shadow-xs">
                            <img src="" alt="" class="thumbnail">
                            <div class="info">
                                <div class="title">{{ $i->book->title }}</div>
                                <div class="author">{{ $i->book->author }}</div>
                                <div class="rating"></div>
                            </div>
                        </a>
                    @endforeach
                @endforeach
            </div>
        @endif
    </main>

@endsection
