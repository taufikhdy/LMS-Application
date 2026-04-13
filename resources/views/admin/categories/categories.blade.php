@extends('layouts')

@section('title', "Lam's Categories")

@section('content')

    <main>
        <header class="flex justify-center align-center w-100 min-vh-15 gap-4">

            <form action="{{ route('admin.categories') }}" method="get">
                <div class="flex justify-center align-center gap-4">
                    <div class="flex align-center w-100">
                        <input type="text" name="search" id="" placeholder="Cari" class="input-search w-100"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn-primary w-max">Cari</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('admin.storeCategory') }}" method="post">
                @csrf
                <div class="flex justify-center align-center gap-4">
                    <div class="flex align-center w-100">
                        <input type="text" name="name" id="" class="input-search w-100"
                            placeholder="Category Name">
                        <button type="submit" class="btn-primary w-100"><i class="ri-add-fill"></i>
                            Tambah</button>
                    </div>
                </div>
            </form>

        </header>

        <section>
            <div class="grid grid-col-4 gap-4 p-4 w-100">
                @foreach ($categories as $category)
                    <div class="category-item bg-neutral-900 shadow-xs flex flex-between align-center gap-1 p-3 radius-md">

                        <form action="{{ route('admin.updateCategory', $category->id) }}" method="post" class="form-edit">
                            @csrf
                            @method('PUT')

                            <div class="flex flex-between">
                                <input type="text" name="name" class="input-name w-100" value="{{ $category->name }}"
                                    disabled required>
                                <button type="submit" class="btn-submit hidden"><i
                                        class="ri-checkbox-circle-line text-lg color-success"></i></button>
                            </div>
                        </form>

                        <form action="{{ route('admin.deleteCategory', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="flex align-center gap-2">
                                <button type="button" class="btn-edit"><i
                                        class="ri-edit-line text-lg color-warning"></i></button>
                                <button type="button" class="btn-cancel hidden"><i
                                        class="ri-close-circle-line text-lg color-warning"></i></button>
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus kategori {{ $category->name }}')">
                                    <i class="ri-delete-bin-line text-lg color-error w-max"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
