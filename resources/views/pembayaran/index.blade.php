<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Pembayaran Kos
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between mb-4">

                <a href="/pembayaran/create"
                    class="bg-gray-500 text-white px-4 py-2 rounded">

                    + Tambah Pembayaran

                </a>

            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">

                <table class="table-auto w-full border">

                    <thead>

                        <tr class="bg-gray-200">

                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Penghuni</th>
                            <th class="border p-2">Kamar</th>
                            <th class="border p-2">Harga Kamar</th>
                            <th class="border p-2">Total Bayar</th>
                            <th class="border p-2">Sisa Tagihan</th>
                            <th class="border p-2">Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($penghunis as $penghuni)

                            @php

                                $hargaKamar = $penghuni->kamar->harga;

                                $totalBayar = $penghuni->pembayaran->sum('jumlah_bayar');

                                $sisaTagihan = max(0, $hargaKamar - $totalBayar);

                            @endphp

                            <tr>

                                <td class="border p-2">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="border p-2">
                                    {{ $penghuni->nama }}
                                </td>

                                <td class="border p-2">
                                    {{ $penghuni->kamar->nomor_kamar }}
                                </td>

                                <td class="border p-2">
                                    Rp {{ number_format($hargaKamar,0,',','.') }}
                                </td>

                                <td class="border p-2">
                                    Rp {{ number_format($totalBayar,0,',','.') }}
                                </td>

                                <td class="border p-2">
                                    Rp {{ number_format($sisaTagihan,0,',','.') }}
                                </td>

                                <td class="border p-2">

                                    @if($totalBayar >= $hargaKamar)

                                        <span class="bg-green-500 text-white px-2 py-1 rounded">
                                            Lunas
                                        </span>

                                    @elseif($totalBayar > 0)

                                        <span class="bg-yellow-500 text-white px-2 py-1 rounded">
                                            Nyicil
                                        </span>

                                    @else

                                        <span class="bg-red-500 text-white px-2 py-1 rounded">
                                            Belum Bayar
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="border p-4 text-center">

                                    Belum ada data penghuni

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</x-app-layout>