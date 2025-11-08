<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Wali Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="text-sm font-medium text-gray-500">Total Siswa Perwalian</p>
                        <p class="text-3xl font-bold text-green-600">{{ $stats['total_siswa_wali'] }}</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="text-sm font-medium text-gray-500">Konseling Bulan Ini</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $stats['siswa_konseling_bulan_ini'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Daftar Siswa -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Daftar Siswa Perwalian</h3>
                    @if($siswas->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($siswas as $siswa)
                                <div class="border rounded-lg p-4">
                                    <p class="font-medium">{{ $siswa->nama }}</p>
                                    <p class="text-sm text-gray-600">NIS: {{ $siswa->nis }}</p>
                                    <p class="text-sm text-gray-600">Kelas: {{ $siswa->kelas }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Belum ada siswa perwalian</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
