<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('admin.updateUser', $user->id) }}" method="post">
        @csrf
        @method('PUT')

        <input type="text" name="name" id="" placeholder="Name" value="{{$user->name}}">

        <input type="email" name="email" id="" placeholder="Email" value="{{$user->email}}">

        <select name="role_id" id="">
            <option value="{{$user->role->id}}">{{$user->role->name}}</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>

        {{-- <input type="text" name="password" id="" placeholder="Password"> --}}

        <input type="submit" value="Edit">
    </form>
</body>

</html>
