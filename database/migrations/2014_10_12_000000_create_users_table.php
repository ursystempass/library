<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_user', 25);
            $table->char('nis', 20)->unique();
            $table->string('fullname', 125);
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('kelas', 50);
            $table->string('alamat', 225);
            $table->string('verif', 50);
            $table->string('role', 50)->default('member'); // Tambah kolom role
            $table->string('join_date', 125);
            $table->string('terakhir_login', 125)->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
