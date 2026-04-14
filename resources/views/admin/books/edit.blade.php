@extends('layouts')

@section('title', 'LMS Book Edit')

@section('content')
    <main>
        <div class="flex justify-center p-6">
            <div class="input-layer shadow-xs p-4">
                <form action="{{ route('admin.updateBook', $book->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="text-xl text-bold text-center p-6">Edit Buku "{{ $book->title }}"</div>

                    <label for="">Cover Saat Ini</label>
                    <div class="flex justify-center w-100">
                        <img src="{{ asset('storage/' . $book->image) }}" alt="" class="w-50 mb-4">
                    </div>

                    <label for="title">Judul Buku</label>
                    <input type="text" name="title" id="" placeholder="Title" value="{{ $book->title }}">

                    <label for="category">Kategori Buku</label>
                    <select name="categories[]" id="" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $book->categories->contains($category->id) ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>

                    <label for="author">Penulis</label>
                    <input type="text" name="author" id="" placeholder="Author" value="{{ $book->author }}">

                    <label for="publisher">Penerbit</label>
                    <input type="text" name="publisher" id="" placeholder="Publisher"
                        value="{{ $book->publisher }}">

                    <label for="year">Tahun Terbit</label>
                    <input type="text" name="year" id="" placeholder="Year" value="{{ $book->year }}">

                    <label for="stock">Stok</label>
                    <input type="text" name="stock" id="" placeholder="Stock" value="{{ $book->stock }}">

                    <label for="desc">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="10" placeholder="Description">{{ $book->description }}</textarea>

                    <button type="submit" class="btn-warning w-100 radius-sm"><i class="ri-edit-line"></i> Edit</button>
                </form>
            </div>
        </div>
    </main>

@endsection
