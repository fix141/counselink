<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_konselings', function (Blueprint $table) {
            $table->id();
            $table->string('no_konseling')->unique();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->foreignId('guru_id')->constrained('gurus')->onDelete('cascade');
            $table->foreignId('wali_kelas_id')->nullable()->constrained('gurus')->onDelete('set null');
            $table->foreignId('orangtua_id')->nullable()->constrained('orangtuas')->onDelete('set null');
            $table->enum('jenis_konseling', ['onsite', 'online']);
            $table->date('tanggal_konseling');
            $table->time('waktu_konseling')->nullable();
            $table->enum('kategori_permasalahan', [
                'akademik',
                'konflik_dengan_guru',
                'keluarga',
                'percintaan',
                'ekonomi',
                'perundungan',
                'pelecehan_seksual',
                'kekerasan_seksual',
                'kesulitan_beradaptasi',
                'konflik_dengan_teman',
                'lainnya'
            ]);
            $table->text('deskripsi_masalah');
            $table->text('solusi')->nullable();
            $table->enum('status_masalah', ['menunggu', 'dijadwalkan', 'selesai', 'dibatalkan'])->default('menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_konselings');
    }
};
