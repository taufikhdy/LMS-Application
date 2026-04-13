@extends('layouts')

@section('title', "Lam's Books")

@section('content')
    <main>

        <header class="flex justify-center align-center w-100 min-vh-20">

            <form action="{{ route('user.books') }}" method="get">
                @csrf

                <div class="flex justify-center align-center gap-4">
                    <div class="flex align-center w-100">
                        <input type="text" name="search" id="" placeholder="Cari" class="input-search w-100"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn-primary w-max">Cari</button>
                    </div>

                    <select name="filter" id="" class="select-search" onchange="this.form.submit()">
                        <option value="">Filter</option>
                        <optgroup label="Kategori">
                            @foreach ($categories as $c)
                                <option value="category:{{ $c->name }}"
                                    {{ request('filter') == 'category:' . $c->name ? 'selected' : '' }}>{{ $c->name }}
                                </option>
                            @endforeach
                        </optgroup>

                        <optgroup label="Author">
                            @foreach ($authors as $a)
                                <option value="author:{{ $a }}"
                                    {{ request('filter') == 'author:' . $a ? 'selected' : '' }}>{{ $a }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
            </form>

        </header>

        <h1 class="text-xxl text-bold mb-4">Buku</h1>

        <div class="grid grid-col-6 gap-4 w-100">
            @foreach ($books as $book)
                <div class="box-item shadow-xs">
                    <a href="{{ route('user.bookDetail', $book->id) }}">
                        <img src="{{asset('storage/' . $book->image)}}" alt="" class="thumbnail">
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
    </main>
@endsection
