<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Pembayaran
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                @if ($errors->any())

                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                @endif

                <form action="/pembayaran" method="POST">

                    @csrf

                    <!-- Pilih Penghuni -->
                    <div class="mb-4">

                        <label>Penghuni</label>

                        <select name="penghuni_id" class="w-full border rounded p-2">

                            <option value="">-- Pilih Penghuni --</option>

                            @foreach ($penghunis as $p)

                                <option value="{{ $p->id }}">
                                    {{ $p->nama }} - Kamar {{ $p->kamar->nomor_kamar }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Jumlah Bayar -->
                    <div class="mb-4">

                        <label>Jumlah Bayar</label>

                        <input type="number" name="jumlah_bayar"
                            class="w-full border rounded p-2">

                    </div>

                    <!-- Tanggal -->
                    <div class="mb-4">

                        <label>Tanggal Bayar</label>

                        <input type="date" name="tanggal_bayar"
                            class="w-full border rounded p-2">

                    </div>

                    <!-- Status -->
                

                    <!-- Keterangan -->
                    <div class="mb-4">

                        <label>Keterangan</label>

                        <textarea name="keterangan"
                            class="w-full border rounded p-2"></textarea>

                    </div>

                    <button class="bg-gray-500 text-white px-4 py-2 rounded">
                        Simpan
                    </button>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>