<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('admin.updateCategory', $category->id)}}" method="post">
        @csrf
        @method('PUT')

        <input type="text" name="name" id="" placeholder="Category Name" value="{{$category->name}}">

        <input type="submit" value="Edit">
    </form>
</body>
</html>
