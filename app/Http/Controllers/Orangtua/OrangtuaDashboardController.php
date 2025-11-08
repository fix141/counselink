<?php

namespace App\Http\Controllers\Orangtua;

use App\Http\Controllers\Controller;
use App\Models\BookingKonseling;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrangtuaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pastikan user memiliki relasi orangtua
        if (!$user->orangtua) {
            abort(403, 'User tidak memiliki data Orangtua yang valid.');
        }

        $orangtuaId = $user->orangtua->id;
        $siswaId = $user->orangtua->siswa_id;

        // Statistik
        $stats = [
            'konseling_anak' => BookingKonseling::where('siswa_id', $siswaId)->count(),
        ];

        return view('dashboard.orangtua', compact('stats'));
    }
}
