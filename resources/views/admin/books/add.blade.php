@extends('layouts')

@section('title', 'LMS Book Form')

@section('content')
    <main>
        <div class="flex justify-center p-6">
            <div class="input-layer shadow-xs p-4">
                <form action="{{ route('admin.storeBook') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="text-xl text-bold text-center pt-3 pb-5">Tambah Buku</div>

                    <label for="image">Cover Buku</label>
                    <input type="file" name="image">

                    <label for="title">Judul Buku</label>
                    <input type="text" name="title" id="title" placeholder="Title">

                    <label for="category">Kategori Buku</label>
                    <select name="categories[]" id="category" multiple='multiple'>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <label for="author">Penulis</label>
                    <input type="text" name="author" id="author" placeholder="Author">

                    <label for="publisher">Penerbit</label>
                    <input type="text" name="publisher" id="publisher" placeholder="Publisher">

                    <label for="year">Tahun Terbit</label>
                    <input type="text" name="year" id="year" placeholder="Year">

                    <label for="stock">Stok</label>
                    <input type="text" name="stock" id="stock" placeholder="Stock">

                    <label for="desc">Deskripsi</label>
                    <textarea name="description" id="desc" cols="30" rows="8" placeholder="Description"></textarea>

                    <button type="submit" class="btn-primary w-100 radius-sm"><i class="ri-add-line"></i> Tambah</button>
                </form>
            </div>
        </div>
    </main>

@endsection
