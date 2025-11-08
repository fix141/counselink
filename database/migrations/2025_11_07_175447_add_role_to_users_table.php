<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->after('id')->constrained('roles')->onDelete('cascade');
            $table->string('nik')->nullable()->after('email'); // untuk guru & wali kelas
            $table->string('nis')->nullable()->after('nik'); // untuk siswa
            $table->string('phone')->nullable()->after('nis');
            $table->string('address')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verified_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn(['role_id', 'nik', 'nis', 'phone', 'address', 'gender', 'is_verified', 'verified_at']);
        });
    }
};
