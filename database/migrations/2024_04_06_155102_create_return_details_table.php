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
        Schema::create('return_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('return_back_id');
            $table->unsignedBigInteger('borrow_id');
            $table->decimal('fine', 10, 2)->default(0.00);
            $table->timestamps();
            $table->foreign('return_back_id')->references('id')->on('return_backs')->onDelete('cascade');
            $table->foreign('borrow_id')->references('id')->on('borrowings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_details');
    }
};
