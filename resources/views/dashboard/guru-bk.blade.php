<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Guru BK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="text-sm font-medium text-gray-500">Konseling Hari Ini</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $stats['konseling_hari_ini'] }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="text-sm font-medium text-gray-500">Menunggu Konfirmasi</p>
                        <p class="text-3xl font-bold text-yellow-600">{{ $stats['konseling_menunggu'] }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="text-sm font-medium text-gray-500">Jurnal Belum Direspon</p>
                        <p class="text-3xl font-bold text-red-600">{{ $stats['jurnal_public_belum_direspon'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Konseling Hari Ini -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Jadwal Konseling Hari Ini</h3>
                    @if($konselingHariIni->count() > 0)
                        <div class="space-y-3">
                            @foreach($konselingHariIni as $konseling)
                                <div class="border-l-4 border-blue-500 pl-4 py-2">
                                    <p class="font-medium">{{ $konseling->siswa->nama }}</p>
                                    <p class="text-sm text-gray-600">
                                        {{ $konseling->waktu_konseling ? $konseling->waktu_konseling->format('H:i') : 'Waktu belum ditentukan' }} -
                                        {{ ucfirst(str_replace('_', ' ', $konseling->kategori_permasalahan)) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Tidak ada konseling hari ini</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
