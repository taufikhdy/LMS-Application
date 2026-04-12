@extends('layouts')

@section('title', "Lam's Categories")

@section('content')

    <main>
        <header class="flex justify-center align-center w-100 min-vh-15 gap-4">

            <form action="{{route('admin.categories')}}" method="get">
                @csrf

                <div class="flex justify-center align-center gap-4">
                    <div class="flex align-center w-100">
                        <input type="text" name="search" id="" placeholder="Cari" class="input-search w-100" value="{{request('search')}}">
                        <button type="submit" class="btn-primary w-max">Cari</button>
                    </div>
                </div>
            </form>

            <a href="{{ route('admin.addCategory') }}" class="btn-primary radius-sm w-max"><i class="ri-add-fill"></i>
                Tambah</a>

        </header>

        <section>
            <div class="grid grid-col-8 gap-4 p-4 w-100">
                @foreach ($categories as $category)
                    <div class="bg-neutral-900 shadow-xs flex flex-between align-center gap-4 p-3 w-100 radius-md">
                        {{ $category->name }}
                        <div class="flex align-center gap-2">
                            <a href="{{ route('admin.editCategory', $category->id) }}"><i
                                    class="ri-edit-line text-lg color-warning"></i></a>
                            <form action="{{ route('admin.deleteCategory', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus kategori {{$category->name}}')"><i class="ri-delete-bin-line text-lg color-error"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
