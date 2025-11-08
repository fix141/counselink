<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ==================== ADMIN ====================
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Admin System',
            'email' => 'admin@counselink.test',
            'password' => Hash::make('password'),
            'is_verified' => true,
            'verified_at' => now(),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ==================== GURU BK ====================
        $guruBkUserId = DB::table('users')->insertGetId([
            'role_id' => 2,
            'name' => 'Bu Siti Nurhaliza',
            'email' => 'siti.bk@counselink.test',
            'nik' => '3201234567890001',
            'phone' => '081234567890',
            'password' => Hash::make('password'),
            'is_verified' => true,
            'verified_at' => now(),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('gurus')->insert([
            'user_id' => $guruBkUserId,
            'nik' => '3201234567890001',
            'nama' => 'Bu Siti Nurhaliza',
            'no_telp' => '081234567890',
            'jabatan' => 'guru_bk',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ==================== WALI KELAS ====================
        $waliKelasUserId = DB::table('users')->insertGetId([
            'role_id' => 3,
            'name' => 'Pak Ahmad Dahlan',
            'email' => 'ahmad.wali@counselink.test',
            'nik' => '3201234567890002',
            'phone' => '081234567891',
            'password' => Hash::make('password'),
            'is_verified' => true,
            'verified_at' => now(),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('gurus')->insert([
            'user_id' => $waliKelasUserId,
            'nik' => '3201234567890002',
            'nama' => 'Pak Ahmad Dahlan',
            'no_telp' => '081234567891',
            'jabatan' => 'wali_kelas',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ==================== SISWA ====================
        $siswaUserId = DB::table('users')->insertGetId([
            'role_id' => 4,
            'name' => 'Budi Santoso',
            'email' => 'budi.siswa@counselink.test',
            'nis' => '2024001',
            'phone' => '081234567892',
            'gender' => 'L',
            'password' => Hash::make('password'),
            'is_verified' => true,
            'verified_at' => now(),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $siswaId = DB::table('siswas')->insertGetId([
            'user_id' => $siswaUserId,
            'nis' => '2024001',
            'nama' => 'Budi Santoso',
            'jenis_kelamin' => 'L',
            'no_hp' => '081234567892',
            'penjurusan' => 'Teknik Komputer dan Jaringan',
            'kelas' => 'XII TKJ 1',
            'minat_bakat' => 'Programming, Gaming',
            'rencana_karir' => 'Software Engineer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ==================== ORANG TUA ====================
        $orangtuaUserId = DB::table('users')->insertGetId([
            'role_id' => 5,
            'name' => 'Bapak Santoso',
            'email' => 'santoso.ortu@counselink.test',
            'phone' => '081234567893',
            'password' => Hash::make('password'),
            'is_verified' => true,
            'verified_at' => now(),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('orangtuas')->insert([
            'user_id' => $orangtuaUserId,
            'siswa_id' => $siswaId,
            'nama' => 'Bapak Santoso',
            'alamat' => 'Jl. Pendidikan No. 123, Bandung',
            'no_hp' => '081234567893',
            'pekerjaan' => 'Wiraswasta',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ==================== DATA PERWALIAN (OPSIONAL) ====================
        $guruWaliId = DB::table('gurus')->where('jabatan', 'wali_kelas')->first()->id;

        DB::table('perwalians')->insert([
            'tahun_ajaran' => '2024/2025',
            'guru_id' => $guruWaliId,
            'siswa_id' => $siswaId,
            'kelas' => 'XII TKJ 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
