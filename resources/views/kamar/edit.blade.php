<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Kamar
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
                <form action="/kamar/{{ $kamar->id }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Nomor Kamar</label>

                        <input type="text"
                            name="nomor_kamar"
                            value="{{ $kamar->nomor_kamar }}"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Harga</label>

                        <input type="number"
                            name="harga"
                            value="{{ $kamar->harga }}"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Lantai</label>

                        <input type="text"
                            name="lantai"
                            value="{{ $kamar->lantai }}"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Status</label>

                        <select name="status"
                            class="w-full border rounded p-2">

                            <option value="kosong"
                                {{ $kamar->status == 'kosong' ? 'selected' : '' }}>
                                Kosong
                            </option>

                            <option value="terisi"
                                {{ $kamar->status == 'terisi' ? 'selected' : '' }}>
                                Terisi
                            </option>

                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Deskripsi</label>

                        <textarea name="deskripsi"
                            class="w-full border rounded p-2">{{ $kamar->deskripsi }}</textarea>
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