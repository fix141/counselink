<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perwalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_ajaran',
        'guru_id',
        'siswa_id',
        'kelas',
    ];

    // Relasi ke Guru (Wali Kelas)
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
