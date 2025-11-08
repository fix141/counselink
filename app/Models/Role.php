<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
    ];

    // Relasi: Role memiliki banyak Users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Helper method untuk cek role
    public static function getIdByName($name)
    {
        return self::where('name', $name)->first()?->id;
    }
}
