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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('book_code')->unique();
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->integer('publication_year');
            $table->integer('number_of_copies');
            $table->string('registration_number')->nullable();
            $table->date('acquisition_date');
            $table->string('acquisition_source');
            $table->string('image');
            $table->enum('status', ['ready', 'borrow'])->default('ready');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->unsignedBigInteger('bookshelf_id');
            $table->foreign('bookshelf_id')->references('id')->on('book_shelves');
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
