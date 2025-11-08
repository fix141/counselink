<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'siswa_id',
        'nama',
        'alamat',
        'no_hp',
        'pekerjaan',
    ];

    // Relasi: Orangtua belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Orangtua belongs to Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi: Orangtua bisa terlibat di Booking Konseling
    public function bookingKonselings()
    {
        return $this->hasMany(BookingKonseling::class);
    }
}
