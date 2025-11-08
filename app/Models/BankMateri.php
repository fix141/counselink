<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankMateri extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_id',
        'judul',
        'deskripsi',
        'file_path',
        'file_type',
        'kategori',
        'views_count',
        'is_active',
    ];

    protected $casts = [
        'views_count' => 'integer',
        'is_active' => 'boolean',
    ];

    // Relasi ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    // Helper: Increment view count
    public function incrementViews()
    {
        $this->increment('views_count');
    }
}
