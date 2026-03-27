@extends('layouts')

@section('title', "Lam's Users")

@section('content')
    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>

        @php
            $no = 1;
        @endphp

        @foreach ($users as $user)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>
                    <a href="{{ route('admin.editUser', $user->id) }}">edit</a>
                    <form action="{{route('admin.deleteUser', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="hapus">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
