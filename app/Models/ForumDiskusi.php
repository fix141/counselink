<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumDiskusi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'gambar',
        'kategori',
        'views_count',
        'is_active',
    ];

    protected $casts = [
        'views_count' => 'integer',
        'is_active' => 'boolean',
    ];

    // Relasi ke User (pembuat topik)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Komentar
    public function komentars()
    {
        return $this->hasMany(ForumKomentar::class);
    }

    // Helper: Increment view count
    public function incrementViews()
    {
        $this->increment('views_count');
    }

    // Helper: Get jumlah komentar
    public function getKomentarCount()
    {
        return $this->komentars()->where('is_active', true)->count();
    }
}
