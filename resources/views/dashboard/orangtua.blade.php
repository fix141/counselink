<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Orang Tua') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Info Anak -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Informasi Anak</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Nama</p>
                            <p class="font-medium">{{ $orangtua->siswa->nama }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">NIS</p>
                            <p class="font-medium">{{ $orangtua->siswa->nis }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Kelas</p>
                            <p class="font-medium">{{ $orangtua->siswa->kelas ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Penjurusan</p>
                            <p class="font-medium">{{ $orangtua->siswa->penjurusan ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="text-sm font-medium text-gray-500">Konseling Bulan Ini</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $stats['konseling_bulan_ini'] }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="text-sm font-medium text-gray-500">Jurnal Public Bulan Ini</p>
                        <p class="text-3xl font-bold text-green-600">{{ $stats['jurnal_public_bulan_ini'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Perkembangan Anak -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Perkembangan Konseling Anak</h3>
                    @if($konselingAnak->count() > 0)
                        <div class="space-y-3">
                            @foreach($konselingAnak as $konseling)
                                <div class="border rounded-lg p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium">Konseling dengan {{ $konseling->guru->nama }}</p>
                                            <p class="text-sm text-gray-600">{{ $konseling->tanggal_konseling->format('d M Y') }}</p>
                                            <p class="text-sm text-gray-600">Kategori: {{ ucfirst(str_replace('_', ' ', $konseling->kategori_permasalahan)) }}</p>
                                        </div>
                                        <span class="px-3 py-1 text-xs rounded-full {{ $konseling->status_masalah === 'selesai' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ ucfirst($konseling->status_masalah) }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Belum ada riwayat konseling</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
