<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingKonseling extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_konseling',
        'siswa_id',
        'guru_id',
        'wali_kelas_id',
        'orangtua_id',
        'jenis_konseling',
        'tanggal_konseling',
        'waktu_konseling',
        'kategori_permasalahan',
        'deskripsi_masalah',
        'solusi',
        'status_masalah',
    ];

    protected $casts = [
        'tanggal_konseling' => 'date',
        'waktu_konseling' => 'datetime',
    ];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi ke Guru BK
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    // Relasi ke Wali Kelas
    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }

    // Relasi ke Orangtua
    public function orangtua()
    {
        return $this->belongsTo(Orangtua::class);
    }

    // Helper: Generate nomor konseling otomatis
    public static function generateNoKonseling()
    {
        $prefix = 'KS-' . date('Ymd') . '-';
        $lastKonseling = self::where('no_konseling', 'like', $prefix . '%')
            ->orderBy('no_konseling', 'desc')
            ->first();

        if (!$lastKonseling) {
            return $prefix . '0001';
        }

        $lastNumber = intval(substr($lastKonseling->no_konseling, -4));
        return $prefix . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    }
}
