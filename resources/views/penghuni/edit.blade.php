<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Penghuni
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <form action="{{ route('penghuni.update', $penghuni->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Nama</label>
                        <input type="text"
                            name="nama"
                            value="{{ $penghuni->nama }}"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>No HP</label>
                        <input type="text"
                            name="no_hp"
                            value="{{ $penghuni->no_hp }}"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Alamat</label>
                        <textarea name="alamat"
                            class="w-full border rounded p-2">{{ $penghuni->alamat }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label>Kamar</label>

                        <select name="kamar_id"
                            class="w-full border rounded p-2">

                            @foreach($kamars as $kamar)

                                <option value="{{ $kamar->id }}"
                                    {{ $penghuni->kamar_id == $kamar->id ? 'selected' : '' }}>

                                    {{ $kamar->nomor_kamar }}

                                </option>

                            @endforeach

                        </select>
                    </div>

                    <button
                        class="bg-gray-500 text-white px-4 py-2 rounded">

                        Update

                    </button>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>