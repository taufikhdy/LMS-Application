@extends('layouts')

@section('title', "Lam's Dashboard")

@section('content')

    <header class="flex justify-center align-center w-100 min-vh-20">

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

    @foreach ($cartItems as $item)
        {{ $item->book->title }}
        {{ $item->book->author }}
        {{ $item->book->publisher }}
        {{ $item->book->year }}
        {{ $item->book->stock }}
        {{ $item->book->description }}

        <form action="{{ route('user.cartRemove', $item->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-primary">Hapus</button>
        </form>
    @endforeach

@endsection
