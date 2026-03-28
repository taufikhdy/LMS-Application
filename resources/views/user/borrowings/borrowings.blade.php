@extends('layouts')

@section('title', "Lam's Borrows")

@section('content')

    <h2>Riwayat Peminjaman</h2>

    @foreach ($borrowings as $b)
        <p>Status: <strong>{{ $b->status }}</strong></p>
        <p>Tanggal: {{ $b->borrow_date }}</p>
        <p>Tanggal Kembali: {{$b->due_date}}</p>
        <p>Denda: Rp {{ number_format($b->fine, 0, ',', '.') }}</p>

        <ul>
            @foreach ($b->details as $d)
                <li>{{ $d->book->title }}</li>
            @endforeach
        </ul>

        {{-- <a href="{{ route('user.bookDetail', $b->book->id) }}" class="box-item">
            <img src="" alt="" class="thumbnail">
            <div class="info">
                <div class="title">{{ $b->book->title }}</div>
                <div class="author">{{ $b->book->author }}</div>
                <div class="rating"></div>

                <p>{{$b->status}} {{$b->borrow_date}}</p>

            </div>
        </a> --}}

        </div>
    @endforeach

@endsection
