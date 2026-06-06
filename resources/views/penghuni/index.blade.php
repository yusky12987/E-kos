<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Penghuni
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="/penghuni/create"
                class="bg-gray-500 text-white px-4 py-2 rounded">

                + Tambah Penghuni

            </a>

            <div class="bg-white shadow-sm rounded-lg p-6 mt-4">

                <table class="table-auto w-full border">

                    <thead>

                        <tr class="bg-gray-200">

                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">No HP</th>
                            <th class="border p-2">Alamat</th>
                            <th class="border p-2">Kamar</th>
                            <th class="border p-2">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($penghunis as $penghuni)

                        <tr>

                            <td class="border p-2">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border p-2">
                                {{ $penghuni->nama }}
                            </td>

                            <td class="border p-2">
                                {{ $penghuni->no_hp }}
                            </td>

                            <td class="border p-2">
                                {{ $penghuni->alamat }}
                            </td>

                            <td class="border p-2">
                                {{ $penghuni->kamar->nomor_kamar }}
                            </td>

                            <td class="border p-2">

                                <a href="{{ route('penghuni.edit', $penghuni->id) }}"
                                    class="bg-yellow-500 text-white  mr-2 px-3 py-1 rounded">

                                    Edit

                                </a>

                                 <form action="{{ route('penghuni.destroy', $penghuni->id) }}"
                                    method="POST"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin hapus data?')"
                                        class="bg-red-500 text-white px-3 py-1 rounded">

                                        Hapus
                                    </button>

                                </form>

                            {{-- </td>

                             <td class="border p-2">

                                <a href="/kamar/{{ $kamar->id }}/edit"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded">

                                    Edit
                                </a>

                                <form action="/kamar/{{ $kamar->id }}"
                                    method="POST"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin hapus data?')"
                                        class="bg-red-500 text-white px-3 py-1 rounded">

                                        Hapus
                                    </button>

                                </form>

                            </td> --}}

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="border p-4 text-center">

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