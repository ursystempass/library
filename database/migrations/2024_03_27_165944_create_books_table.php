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
            $table->string('title');
            $table->string('isbn')->nullable();
            $table->string('book_code');
            $table->string('image')->nullable();
            $table->string('book_category');
            $table->string('publisher');
            $table->string('author');
            $table->integer('publication_year');
            $table->enum('condition', ['good', 'damaged']);
            $table->unsignedBigInteger('shelf_location_id');
            $table->foreign('shelf_location_id')->references('id')->on('book_shelves');
            $table->integer('copy_number');
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
