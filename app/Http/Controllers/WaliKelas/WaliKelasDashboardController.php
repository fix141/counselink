<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Perwalian;
use App\Models\BookingKonseling;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WaliKelasDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pastikan user memiliki relasi guru
        if (!$user->guru) {
            abort(403, 'User tidak memiliki data Wali Kelas yang valid.');
        }

        $waliKelasId = $user->guru->id;

        // Ambil siswa yang menjadi perwalian
        $siswas = Perwalian::with('siswa')
            ->where('guru_id', $waliKelasId)
            ->get()
            ->pluck('siswa')
            ->filter();

        // Statistik
        $stats = [
            'total_siswa_wali' => $siswas->count(),
            'siswa_konseling_bulan_ini' => BookingKonseling::whereIn('siswa_id', $siswas->pluck('id'))
                ->whereMonth('tanggal_konseling', now()->month)
                ->count(),
        ];

        return view('dashboard.wali-kelas', compact('stats', 'siswas'));
    }
}
