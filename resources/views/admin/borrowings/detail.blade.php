@extends('layouts')

@section('title', "Lam's Borrows")

@section('content')

    <div class="flex justify-center w-100">

        <div class="paper shadow-xs">

            @foreach ($details as $d)
                <div class="title text-bold">
                    {{ $d->borrowing->borrow_date }}
                </div>

                <div class="paper-item">

                    <table class="general-table mb-3">
                        @php
                            $no = 1;
                        @endphp

                        <tr>
                            <td rowspan="2" class="text-center">{{ $no++ }}</td>
                            <td class="bg-neutral-800">Judul</td>
                            <td>{{ $d->book->title }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Dikembalikan</td>
                            <td>{{ $d->returned_at }}</td>
                        </tr>

                    </table>
                    <span class="block text-bold">Jatuh Tempo {{ $d->borrowing->due_date }}</span>
                    <span class="block">Denda Rp {{ number_format($d->borrowing->fine, 0, ',', '.') }}</span>
                </div>
            @endforeach
        </div>

    </div>
@endsection
