<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\BookingKonseling;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistik untuk admin - pastikan semua query aman
        $stats = [
            'total_users' => User::count(),
            'total_siswa' => Siswa::count(),
            'total_guru_bk' => Guru::where('jabatan', 'guru_bk')->count(),
            'total_wali_kelas' => Guru::where('jabatan', 'wali_kelas')->count(),
            'total_konseling' => BookingKonseling::count(),
            'konseling_pending' => BookingKonseling::where('status_masalah', 'menunggu')->count(),
        ];

        return view('dashboard.admin', compact('stats'));
    }
}
