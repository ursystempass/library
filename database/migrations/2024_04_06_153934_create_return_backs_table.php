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
        Schema::create('return_backs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrowing_id');
            $table->string('return_date', 125);
            $table->foreign('borrowing_id')->references('id')->on('borrowings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_backs');
    }
};
