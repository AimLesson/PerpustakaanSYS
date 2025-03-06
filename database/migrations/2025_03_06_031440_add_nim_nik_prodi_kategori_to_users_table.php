<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nim_nik')->nullable()->after('email');
            $table->enum('prodi', [
                'Sistem Informasi', 
                'Teknik Informatika', 
                'Komputerisasi Akuntansi', 
                'Desain Komunikasi dan Visual'
            ])->nullable()->after('nim_nik');
            $table->enum('kategori', ['Dosen', 'Karyawan', 'Mahasiswa', 'Tamu'])->after('prodi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nim_nik', 'prodi', 'kategori']);
        });
    }
};
