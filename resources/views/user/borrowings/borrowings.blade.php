@extends('layouts')

@section('title', "Lam's Borrows")

@section('content')

    <main>
        @if ($borrowings->isEmpty())
            <div class="block w-100 text-center color-700 p-6">Anda belum meminjam buku</div>
        @else
            <div class="flex justify-center w-100">

                <div class="paper shadow-xs">

                    @foreach ($borrowings as $b)
                        <div class="title text-bold">
                            {{ $b->borrow_date }}
                        </div>

                        <div class="paper-item">

                            <table class="general-table mb-3">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($b->details as $d)
                                    <tr>
                                        <td rowspan="2" class="text-center">{{ $no++ }}</td>
                                        <td class="bg-neutral-800">Judul</td>
                                        <td>{{ $d->book->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Dikembalikan</td>
                                        <td>{{ $d->returned_at }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            @if ($b->status === 'pending' && $b->due_date === null)
                                <span class="text-bold">Pending</span>
                            @elseif ($b->status === 'rejected' && $b->due_date === null)
                                <span class="color-error text-bold">Rejected</span>
                            @else
                                <span class="block text-bold color-warning">Jatuh Tempo {{ $b->due_date }}</span>
                            @endif

                            @if ($b->fine == 0)
                                <span class="block text-bold color-success">Lunas</span>
                            @else
                                <span class="block">Denda <span class="color-error text-bold">Rp
                                        {{ number_format($b->fine, 0, ',', '.') }}</span></span>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>
        @endif
    </main>
@endsection
