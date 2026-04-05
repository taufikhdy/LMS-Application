@extends('layouts')

@section('title', "Lam's Dashboard")

@section('content')

    <header>

        <div class="customer-banner">

        </div>

    </header>

    <main>
        <h1 class="text-xxl text-bold mb-4">Buku</h1>
        <div class="flex justify-start gap-4 mb-3">
            <a href="">Popular</a>
            <a href="">Last Added</a>
        </div>
        <div class="grid grid-col-6 gap-4 w-100">
            @foreach ($books as $book)
                <a href="{{ route('user.bookDetail', $book->id) }}" class="box-item shadow-xs">
                    <img src="" alt="" class="thumbnail">
                    <div class="info">
                        <div class="title">{{ $book->title }}</div>
                        <div class="author">{{ $book->author }}</div>
                        <div class="rating"></div>
                    </div>
                </a>
            @endforeach
        </div>



        {{-- BORROW --}}

        <h1 class="text-xxl text-bold mt-6 mb-4">Sedang Dipinjam</h1>
        @if ($borrowings->isEmpty())
            <div class="block w-100 text-center color-700 p-6">Anda belum meminjam buku</div>
        @else
            <div class="grid grid-col-6 gap-4 w-100">
                @foreach ($borrowings as $b)
                    @foreach ($b->details as $i)
                        <a href="{{ route('user.bookDetail', $i->id) }}" class="box-item shadow-xs">
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
