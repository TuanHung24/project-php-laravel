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
        Schema::create('chi_tiet_khuyen_mai', function (Blueprint $table) {
            $table->id();
           
            $table->foreignId('khuyen_mai_id')->constrained('khuyen_mai');

           
            $table->foreignId('san_pham_id')->constrained('san_pham');

            $table->bigInteger('loai_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_khuyen_mai');
    }
};
