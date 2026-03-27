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
        <div class="p-4">
            <div class="flex justify-start gap-4 mb-3">
                <a href="">Popular</a>
                <a href="">Last Added</a>
            </div>
            <div class="grid grid-col-6 gap-4 w-100">
                @foreach ($books as $book)
                    <a href="{{ route('user.bookDetail', $book->id) }}" class="box-item">
                        <img src="" alt="" class="thumbnail">
                        <div class="info">
                            <div class="title">{{ $book->title }}</div>
                            <div class="author">{{ $book->author }}</div>
                            <div class="rating"></div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </main>

@endsection
