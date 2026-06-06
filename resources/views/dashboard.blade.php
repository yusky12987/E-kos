<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-lg font-bold">Jumlah Kamar</h1>
                    <p class="text-3xl mt-3 text-blue-600">{{ $jumlahKamar }}</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-lg font-bold">Penghuni Aktif</h1>
                    <p class="text-3xl mt-3 text-green-600">{{ $kamarTerisi }}</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-lg font-bold">Kamar Kosong</h1>
                    <p class="text-3xl mt-3 text-red-600">{{ $kamarKosong }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow mt-4">

                    <h3 class="text-gray-500">Total Pemasukan Kos</h3>

                    <p class="text-2xl font-bold text-green-600">
                        Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                    </p>

                </div>

            </div>

    

        </div>
    </div>
</x-app-layout>