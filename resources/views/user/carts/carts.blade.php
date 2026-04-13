@extends('layouts')

@section('title', "Lam's Dashboard")

@section('content')
    <main>
        <h1 class="text-xxl text-bold mb-4">Keranjang</h1>

        @if ($cart->items->isEmpty())
            <span class="block p-4 text-center color-500">Anda belum menambahkan <a href="{{route('user.books')}}" class="color-primary">buku</a></span>
        @else
            <form action="{{ route('user.borrowStore') }}" method="post">
                @csrf


                <div class="grid grid-col-6 gap-4 w-100">
                    @foreach ($cart->items as $i)
                        <div class="box-item shadow-xs">
                            <a href="{{ route('user.bookDetail', $i->book->id) }}">
                                <img src="{{asset('storage/' . $i->book->image)}}" alt="" class="thumbnail">
                                <div class="info">
                                    <div class="title">{{ $i->book->title }}</div>
                                    <div class="author">{{ $i->book->author }}</div>
                                    <div class="rating"></div>
                                </div>
                            </a>

                            <div class="info">
                                <input type="checkbox" name="books[]" id="" value="{{ $i->book->id }}">
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
                </div>

                <div class="bg-neutral-900 shadow-xs w-100 p-3 absolute z-inherit text-right" style="bottom: 0; left: 0;">
                    <button type="submit" class="btn-primary w-50 text-bold">Pinjam</button>
                </div>

            </form>
        @endif

    </main>

@endsection
