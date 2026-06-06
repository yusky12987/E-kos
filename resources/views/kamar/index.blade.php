<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Kamar
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))

    <div class="bg-green-100 border border-green-400
        text-green-700 px-4 py-3 rounded mb-4">

        {{ session('success') }}

    </div>

            @endif

            <a href="/kamar/create" class=" table-auto w-full border bg-gray-200 rounded-lg p-2 mt-4">
                + Tambah Kamar
            </a>

            <div class="bg-white shadow-sm rounded-lg p-6 mt-4">
                <table class="table-auto w-full border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nomor Kamar</th>
                            <th class="border p-2">Harga</th>
                            <th class="border p-2">Lantai</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($kamars as $kamar)
                        <tr>
                            <td class="border p-2">{{ $loop->iteration }}</td>
                            <td class="border p-2">{{ $kamar->nomor_kamar }}</td>
                            <td class="border p-2">{{ $kamar->harga }}</td>
                            <td class="border p-2">{{ $kamar->lantai }}</td>
                            <td class="border p-2">

                                @if($kamar->status == 'terisi')

                                    <span class="bg-green-500 text-white
                                        px-3 py-1 rounded-full text-sm">

                                        Terisi

                                    </span>

                                @else

                                    <span class="bg-red-500 text-white
                                        px-3 py-1 rounded-full text-sm">

                                        Kosong

                                    </span>

                                @endif

                            </td>
                            <td class="border p-2">

                                <a href="/kamar/{{ $kamar->id }}/edit"
                                    class="bg-yellow-500 text-white mr-2 px-3 py-1 rounded">

                                    Edit
                                </a>

                                <form action="/kamar/{{ $kamar->id }}"
                                    method="POST"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin hapus data?')"
                                        class="bg-red-500 text-white px-1 py-1 rounded">

                                        Hapus
                                    </button>

                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</x-app-layout>