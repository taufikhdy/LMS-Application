<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('admin.storeBook')}}" method="post">
        @csrf

        <input type="text" name="title" id="" placeholder="Title">

        <select name="categories[]" id="" multiple='multiple'>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        <input type="text" name="author" id="" placeholder="Author">

        <input type="text" name="publisher" id="" placeholder="Publisher">

        <input type="text" name="year" id="" placeholder="Year">

        <input type="text" name="stock" id="" placeholder="Stock" value="0">

        <textarea name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>

        <input type="submit" value="Tambah">
    </form>
</body>
</html>
