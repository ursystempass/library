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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('book_code')->unique();
            $table->string('no_induk')->nullable();
            $table->string('judul_buku');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->integer('tahun_terbit');
            $table->date('tgl_thn_perolehan');
            $table->integer('jumlah_exsemplar');
            $table->string('sumber_perolehan');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->unsignedBigInteger('bookshelve_id');
            $table->foreign('bookshelve_id')->references('id')->on('book_shelves');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
