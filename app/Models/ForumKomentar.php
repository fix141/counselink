<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumKomentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'forum_diskusi_id',
        'user_id',
        'komentar',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relasi ke Forum Diskusi
    public function forumDiskusi()
    {
        return $this->belongsTo(ForumDiskusi::class);
    }

    // Relasi ke User (yang komentar)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
