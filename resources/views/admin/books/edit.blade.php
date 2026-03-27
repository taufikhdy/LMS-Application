<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.updateBook', $book->id) }}" method="post">
        @csrf
        @method('PUT')

        <input type="text" name="title" id="" placeholder="Title" value="{{ $book->title }}">

        <select name="categories[]" id="" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $book->categories->contains($category->id) ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>

        <input type="text" name="author" id="" placeholder="Author" value="{{ $book->author }}">

        <input type="text" name="publisher" id="" placeholder="Publisher" value="{{ $book->publisher }}">

        <input type="text" name="year" id="" placeholder="Year" value="{{ $book->year }}">

        <input type="text" name="stock" id="" placeholder="Stock" value="0"
            value="{{ $book->stock }}">

        <textarea name="description" id="" cols="30" rows="10" placeholder="Description">{{ $book->description }}</textarea>

        <input type="submit" value="Edit">
    </form>
</body>

</html>
