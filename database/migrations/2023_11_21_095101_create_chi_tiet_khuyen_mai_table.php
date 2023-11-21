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
            $table->bigInteger('khuyen_mai_id');
            $table->bigInteger('san_pham_id');
            $table->bigInteger('loai_id');
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
