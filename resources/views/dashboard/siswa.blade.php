<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-white">
                    <h3 class="text-2xl font-bold">Selamat Datang, {{ auth()->user()->name }}!</h3>
                    <p class="mt-2">Mari jaga kesehatan mental dan semangat belajar kita bersama</p>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="text-sm font-medium text-gray-500">Konseling Mendatang</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $stats['konseling_mendatang'] }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="text-sm font-medium text-gray-500">Jurnal Bulan Ini</p>
                        <p class="text-3xl font-bold text-green-600">{{ $stats['jurnal_bulan_ini'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Konseling Terbaru -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Riwayat Konseling Terbaru</h3>
                    @if($konselingTerbaru->count() > 0)
                        <div class="space-y-3">
                            @foreach($konselingTerbaru as $konseling)
                                <div class="border rounded-lg p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium">{{ $konseling->guru->nama }}</p>
                                            <p class="text-sm text-gray-600">{{ $konseling->tanggal_konseling->format('d M Y') }}</p>
                                            <p class="text-sm text-gray-600">{{ ucfirst(str_replace('_', ' ', $konseling->kategori_permasalahan)) }}</p>
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

            <!-- Materi Populer -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Materi Konseling Populer</h3>
                    @if($materiPopuler->count() > 0)
                        <div class="space-y-3">
                            @foreach($materiPopuler as $materi)
                                <div class="border rounded-lg p-4 hover:bg-gray-50 cursor-pointer">
                                    <p class="font-medium">{{ $materi->judul }}</p>
                                    <p class="text-sm text-gray-600 mt-1">{{ Str::limit($materi->deskripsi, 100) }}</p>
                                    <p class="text-xs text-gray-500 mt-2">👁️ {{ $materi->views_count }} views</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Belum ada materi tersedia</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
