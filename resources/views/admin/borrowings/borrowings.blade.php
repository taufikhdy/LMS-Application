@extends('layouts')

@section('title', "Lam's Pinjam")

@section('content')

    <h2>Data Peminjaman</h2>

    @foreach ($borrowings as $b)
        <p>User: {{ $b->user->name }}</p>
        <p>Status: {{ $b->status }}</p>
        <p>Tanggal: {{ $b->borrow_date }}</p>
        <p>Tanggal Kembali: {{ $b->due_date }}</p>
        <p>Denda: Rp {{ number_format($b->fine, 0, ',', '.') }}</p>

        <ul>
            @foreach ($b->details as $d)
                <li>{{ $d->book->title }}</li>
            @endforeach
        </ul>

        @if ($b->status == 'pending')
            <form action="{{ route('admin.borrowings.confirm', $b->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button>Konfirmasi Peminjaman</button>
            </form>
        @elseif ($b->status == 'borrowed')
            <form action="{{ route('admin.borrowings.returned', $b->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button>Konfirmasi Pengembalian</button>
            </form>
        @endif
    @endforeach

@endsection
