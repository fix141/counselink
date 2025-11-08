<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nis',
        'nama',
        'jenis_kelamin',
        'no_hp',
        'penjurusan',
        'minat_bakat',
        'rencana_karir',
        'kelas',
    ];

    // Relasi: Siswa belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Siswa memiliki banyak Orangtua
    public function orangtuas()
    {
        return $this->hasMany(Orangtua::class);
    }

    // Relasi: Siswa memiliki banyak Booking Konseling
    public function bookingKonselings()
    {
        return $this->hasMany(BookingKonseling::class);
    }

    // Relasi: Siswa memiliki banyak Jurnal Harian
    public function jurnalHarians()
    {
        return $this->hasMany(JurnalHarian::class);
    }

    // Relasi: Siswa memiliki perwalian
    public function perwalians()
    {
        return $this->hasMany(Perwalian::class);
    }
}
