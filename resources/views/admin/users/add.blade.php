<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.storeUser') }}" method="post">
        @csrf

        <input type="text" name="name" id="" placeholder="Name">

        <input type="email" name="email" id="" placeholder="Email">

        <select name="role_id" id="">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>

        <input type="text" name="password" id="" placeholder="Password" value="12345678">

        <input type="submit" value="Tambah">
    </form>
</body>

</html>
