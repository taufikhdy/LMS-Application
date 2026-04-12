@extends('layouts')

@section('title', 'LMS User Form')

@section('content')

    <main>
        <div class="flex justify-center p-6">
            <div class="input-layer shadow-xs p-4">

                <form action="{{ route('admin.storeUser') }}" method="post">
                    @csrf

                    <div class="text-xl text-bold text-center pt-3 pb-5">Tambah Pengguna</div>

                    <div class="flex align-center gap-2">
                        <div class="w-100">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Name">
                        </div>

                        <div class="w-100">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="flex align-center gap-2">
                        <div class="w-100">
                            <label for="role">Role</label>
                            <select name="role_id" id="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-100">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" placeholder="Password" value="12345678">
                        </div>
                    </div>

                    <button type="submit" class="btn-primary w-100 radius-sm"><i class="ri-add-line"></i> Tambah</button>
                </form>
            </div>
        </div>
    </main>

@endsection
