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

    <main>

        <form action="{{ route('user.borrowStore') }}" method="post">
            @csrf

            <div class="p-4">
                <div class="grid grid-col-6 gap-4 w-100">
                    @foreach ($cart->items as $i)
                        <div class="box-item">
                            <a href="{{ route('user.bookDetail', $i->book->id) }}">
                                <img src="" alt="" class="thumbnail">
                                <div class="info">
                                    <div class="title">{{ $i->book->title }}</div>
                                    <div class="author">{{ $i->book->author }}</div>
                                    <div class="rating"></div>
                            </a>
                            {{-- <form action="{{ route('user.cartRemove', $i->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-primary">Hapus</button>
                            </form> --}}

                            <input type="checkbox" name="books[]" id="" value="{{ $i->book->id }}">
                        </div>
                    @endforeach
                </div>
            </div>
            </div>

            <button type="submit">Pinjam</button>

        </form>

    </main>



@endsection
