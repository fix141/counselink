<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik',
        'nama',
        'no_telp',
        'jabatan',
    ];

    // Relasi: Guru belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Guru memiliki banyak Jadwal Konseling
    public function jadwalKonselings()
    {
        return $this->hasMany(JadwalKonseling::class);
    }

    // Relasi: Guru memiliki banyak Booking Konseling
    public function bookingKonselings()
    {
        return $this->hasMany(BookingKonseling::class);
    }

    // Relasi: Guru memiliki banyak Bank Materi
    public function bankMateris()
    {
        return $this->hasMany(BankMateri::class);
    }

    // Helper: Cek apakah Guru BK
    public function isGuruBK()
    {
        return $this->jabatan === 'guru_bk';
    }

    // Helper: Cek apakah Wali Kelas
    public function isWaliKelas()
    {
        return $this->jabatan === 'wali_kelas';
    }
}
