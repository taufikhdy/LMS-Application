@extends('layouts')

@section('title', "Lam's Denda")

@section('content')

    <main>
        <header class="flex justify-center align-center w-100 min-vh-15">

            <form action="{{route('admin.fines')}}" method="get">

                <div class="flex justify-center align-center gap-4">
                    <div class="flex align-center w-100">
                        <input type="text" name="search" id="" placeholder="Cari" class="input-search w-100"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn-primary w-max">Cari</button>
                    </div>
                </div>
            </form>

        </header>

        <section>
            <div class="pt-4 pb-6 grid grid-col-2 gap-4">
                <div class="table-container-2 w-100 radius-md pt-3 pb-4 shadow-xs">
                    <span class="text-md block mb-3 pl-4 pr-4 text-center text-bold color-500">Denda Member</span>
                    <table class="w-100 radius-md">
                        @if ($fines->isEmpty())
                            <tr>
                                <div class="text-center color-700 p-4">Tidak ada data</div>
                            </tr>
                        @else
                            <tr class="color-600 text-sm">
                                <th>Nama</th>
                                <th>Denda</th>
                                <th class="w-50">Bayar</th>
                            </tr>

                            @foreach ($fines as $f)
                                <tr>
                                    <td>{{ $f->name }}</td>
                                    <td class="text-bold color-error">Rp {{ number_format($f->borrowings_sum_fine ?? 0) }}
                                    </td>
                                    <td text>
                                        <form action="{{route('admin.finePay')}}" method="POST">
                                            @csrf

                                            <input type="hidden" name="user_id" id="" value="{{$f->id}}">

                                            <div class="flex align-center gap-1">
                                                Rp.
                                                <input type="number" name="payValue" id="" class="input-basic " placeholder="Bayar" required>
                                                <button type="submit" class="btn-primary">Bayar</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </main>
@endsection
