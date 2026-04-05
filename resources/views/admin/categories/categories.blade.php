@extends('layouts')

@section('title', "Lam's Categories")

@section('content')

    <header class="flex justify-center align-center w-100 min-vh-15 gap-4">

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

        <a href="{{ route('admin.addCategory') }}" class="btn-primary radius-sm w-max"><i class="ri-add-fill"></i> Tambah</a>

    </header>

    <section>
        <div class="grid grid-col-8 gap-4 p-4 w-100">
            @foreach ($categories as $category)
                <div class="bg-neutral-800 flex flex-between align-center gap-4 p-3 w-100 radius-md">
                    {{ $category->name }}
                    <div class="flex align-center gap-2">
                        <a href="{{ route('admin.editCategory', $category->id) }}">edit</a>
                        <form action="{{ route('admin.deleteCategory', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="hapus">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
