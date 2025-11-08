<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurnal_harians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('suasana_hati', ['senang', 'cemas', 'lelah', 'putus_asa', 'termotivasi']);
            $table->text('isi_jurnal');
            $table->enum('sifat_jurnal', ['private', 'public'])->default('private');
            $table->text('respon_guru')->nullable();
            $table->foreignId('guru_id')->nullable()->constrained('gurus')->onDelete('set null');
            $table->timestamp('responded_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurnal_harians');
    }
};
