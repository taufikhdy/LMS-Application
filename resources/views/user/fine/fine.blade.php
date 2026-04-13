@extends('layouts')

@section('title', "Lam's Denda")

@section('content')

    <main>
        <section>
            <div class="flex justify-center align-center">
                <div class="table-container-2 w-50vw radius-md pt-3 pb-4 shadow-xs">
                    <span class="text-md block mb-3 pl-4 pr-4 text-center text-bold color-500">Denda</span>
                    <table class="w-50vw radius-md">
                        @if (!$fines))
                            <tr>
                                <div class="text-center color-700 p-4">Tidak ada data</div>
                            </tr>
                        @else
                            <tr class="color-600 text-sm">
                                <th>Nama</th>
                                <th>Denda</th>
                            </tr>
                            <tr>
                                <td>{{ $fines->name }}</td>
                                @if ($fines->borrowings_sum_fine == 0)
                                    <td><span class="text-bold color-success">Lunas</span></td>
                                @else
                                    <td class="color-error text-bold">Rp {{ number_format($fines->borrowings_sum_fine) }}
                                    </td>
                                @endif
                            </tr>
                        @endif
                    </table>

                    <span class="block color-500 text-center pt-4 text-sm">Segera bayar denda agar bisa meminjam buku
                        kembali</span>
                </div>
            </div>
        </section>
    </main>
@endsection
