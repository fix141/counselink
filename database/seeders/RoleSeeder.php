<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'display_name' => 'Administrator'],
            ['name' => 'guru_bk', 'display_name' => 'Guru BK'],
            ['name' => 'wali_kelas', 'display_name' => 'Wali Kelas'],
            ['name' => 'siswa', 'display_name' => 'Siswa'],
            ['name' => 'orangtua', 'display_name' => 'Orang Tua'],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role['name'],
                'display_name' => $role['display_name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
