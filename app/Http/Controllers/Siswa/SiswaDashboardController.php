<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\BookingKonseling;
use App\Models\JurnalHarian;
use App\Models\BankMateri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SiswaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pastikan user memiliki relasi siswa
        if (!$user->siswa) {
            abort(403, 'User tidak memiliki data Siswa yang valid.');
        }

        $siswaId = $user->siswa->id;

        // Statistik untuk siswa
        $stats = [
            'konseling_mendatang' => BookingKonseling::where('siswa_id', $siswaId)
                ->where('tanggal_konseling', '>=', now())
                ->count(),
            'jurnal_bulan_ini' => JurnalHarian::where('siswa_id', $siswaId)
                ->whereMonth('tanggal', now()->month)
                ->count(),
        ];

        // Materi terbaru
        $materiTerbaru = BankMateri::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard.siswa', compact('stats', 'materiTerbaru'));
    }
}
