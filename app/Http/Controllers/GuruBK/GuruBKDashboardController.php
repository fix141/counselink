<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use App\Models\BookingKonseling;
use App\Models\JurnalHarian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GuruBKDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pastikan user memiliki relasi guru
        if (!$user->guru) {
            abort(403, 'User tidak memiliki data Guru BK yang valid.');
        }

        $guruId = $user->guru->id;

        // Statistik untuk Guru BK
        $stats = [
            'konseling_hari_ini' => BookingKonseling::where('guru_id', $guruId)
                ->whereDate('tanggal_konseling', today())
                ->count(),
            'konseling_menunggu' => BookingKonseling::where('guru_id', $guruId)
                ->where('status_masalah', 'menunggu')
                ->count(),
            'jurnal_public_belum_direspon' => JurnalHarian::where('sifat_jurnal', 'public')
                ->whereNull('respon_guru')
                ->count(),
        ];

        // Konseling hari ini
        $konselingHariIni = BookingKonseling::with(['siswa', 'guru'])
            ->where('guru_id', $guruId)
            ->whereDate('tanggal_konseling', today())
            ->orderBy('waktu_konseling')
            ->get();

        return view('dashboard.guru-bk', compact('stats', 'konselingHariIni'));
    }
}
