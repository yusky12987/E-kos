<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Penghuni
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                @if ($errors->any())

                    <div class="bg-red-100 border border-red-400
                        text-red-700 px-4 py-3 rounded mb-4">

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="/penghuni" method="POST">

                    @csrf

                    <div class="mb-4">

                        <label>Nama</label>

                        <input type="text"
                            name="nama"
                            class="w-full border rounded p-2">

                    </div>

                    <div class="mb-4">

                        <label>No HP</label>

                        <input type="text"
                            name="no_hp"
                            class="w-full border rounded p-2">

                    </div>

                    <div class="mb-4">

                        <label>Alamat</label>

                        <textarea name="alamat"
                            class="w-full border rounded p-2"></textarea>

                    </div>

                    <div class="mb-4">

                        <label>Pilih Kamar</label>

                        <select name="kamar_id"
                            class="w-full border rounded p-2">

                            <option value="">
                                -- Pilih Kamar --
                            </option>

                            @foreach ($kamars as $kamar)

                                <option value="{{ $kamar->id }}">

                                    {{ $kamar->nomor_kamar }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <button
                        class="bg-gray-500 text-white px-4 py-2 rounded">

                        Simpan

                    </button>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>