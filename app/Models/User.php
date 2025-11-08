<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ========== RELATIONSHIPS ==========

    /**
     * User belongs to a Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * User has one Siswa profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    /**
     * User has one Guru profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    /**
     * User has one Orangtua profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orangtua()
    {
        return $this->hasOne(Orangtua::class);
    }

    // ========== HELPER METHODS ==========

    /**
     * Get role name dari user
     *
     * @return string
     */
    public function getRoleName(): string
    {
        return $this->role ? $this->role->name : 'guest';
    }

    /**
     * Check apakah user punya role tertentu
     *
     * @param string $roleName
     * @return bool
     */
    public function hasRole(string $roleName): bool
    {
        return $this->getRoleName() === $roleName;
    }

    /**
     * Check apakah user adalah admin
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    /**
     * Check apakah user adalah Guru BK
     *
     * @return bool
     */
    public function isGuruBK(): bool
    {
        return $this->hasRole('guru_bk');
    }

    /**
     * Check apakah user adalah Wali Kelas
     *
     * @return bool
     */
    public function isWaliKelas(): bool
    {
        return $this->hasRole('wali_kelas');
    }

    /**
     * Check apakah user adalah Siswa
     *
     * @return bool
     */
    public function isSiswa(): bool
    {
        return $this->hasRole('siswa');
    }

    /**
     * Check apakah user adalah Orangtua
     *
     * @return bool
     */
    public function isOrangtua(): bool
    {
        return $this->hasRole('orangtua');
    }
}
