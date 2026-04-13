@extends('layouts')

@section('title', "Lam's Users")

@section('content')

    <main>
        <header>
            <div class="flex justify-between align-center w-100 mb-4">
                <h1 class="text-xxl text-bold">Pengguna ({{$total}})</h1>

                <div class="flex align-center gap-2">
                    <form action="{{ route('admin.users') }}" method="get">
                        <div class="flex align-center w-100">
                            <input type="text" name="search" id="" placeholder="Cari" class="input-search w-max"
                                value="{{ request('search') }}">
                            <button type="submit" class="btn-primary w-max">Cari</button>
                        </div>
                    </form>

                    <a href="{{ route('admin.addUser') }}" class="btn-primary radius-sm w-100"><i class="ri-add-fill"></i>
                        Tambah</a>
                </div>
            </div>
        </header>

        <section>
            <div class="table-container-2 w-100 radius-md pt-3 pb-4 shadow-xs">
                <table class="w-100 radius-md">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Menu</th>
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
                                <div class="flex justify-center align-center gap-4">
                                    <a href="{{ route('admin.editUser', $user->id) }}"><i
                                            class="ri-edit-line text-lg color-warning"></i></a>
                                    <form action="{{ route('admin.deleteUser', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus pengguna {{ $user->name }}')"><i
                                                class="ri-delete-bin-line text-lg color-error"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </section>
    </main>
@endsection
