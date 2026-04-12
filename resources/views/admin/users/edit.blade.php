@extends('layouts')

@section('title', 'LMS User Form')

@section('content')

    <main>
        <div class="flex justify-center p-6">
            <div class="input-layer shadow-xs p-4">

                <form action="{{ route('admin.updateUser', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="text-xl text-bold text-center pt-3 pb-5">Edit Data "{{ $user->name }}"</div>

                    <div class="flex align-center gap-2">
                        <div class="w-100">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="" placeholder="Name"
                                value="{{ $user->name }}">
                        </div>

                        <div class="w-100">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="" placeholder="Email"
                                value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="w-50">
                        <label for="role">Role</label>
                        <select name="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn-warning w-100 radius-sm"><i class="ri-pen-line"></i> Edit</button>
                </form>
            </div>
        </div>
    </main>

@endsection
