<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalHarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'tanggal',
        'suasana_hati',
        'isi_jurnal',
        'sifat_jurnal',
        'respon_guru',
        'guru_id',
        'responded_at',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'responded_at' => 'datetime',
    ];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi ke Guru (yang merespon)
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    // Helper: Cek apakah sudah direspon
    public function hasBeenResponded()
    {
        return !is_null($this->respon_guru);
    }

    // Helper: Cek apakah public
    public function isPublic()
    {
        return $this->sifat_jurnal === 'public';
    }
}
