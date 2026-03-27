@extends('layouts')

@section('title', "Lam's Books")

@section('content')
    <table>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Categories</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Year</th>
            <th>Stock</th>
            <th>Description</th>
            <th>Menu</th>
        </tr>

        @php
            $no = 1;
        @endphp

        @foreach ($books as $book)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $book->title }}</td>
                <td>
                    @foreach ($book->categories as $category)
                        {{$category->name . ', '}}
                    @endforeach
                </td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->stock }}</td>
                <td>{{ $book->description }}</td>
                <td>
                    <a href="{{ route('admin.editBook', $book->id) }}">edit</a>
                    <form action="{{ route('admin.deleteBook', $book->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="hapus">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
