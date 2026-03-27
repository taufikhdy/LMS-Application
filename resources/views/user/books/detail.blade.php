<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{ $book->title }}
    @foreach ($book->categories as $category)
        {{ $category->name . ', ' }}
    @endforeach
    {{ $book->author }}
    {{ $book->publisher }}
    {{ $book->year }}
    {{ $book->stock }}
    {{ $book->description }}

    <form action="{{route('user.addToCart', $book->id)}}">
        @csrf
        <button type="submit" class="btn-primary">Tambah</button>
    </form>
</body>

</html>
