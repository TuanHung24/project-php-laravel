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
        Schema::create('ap_dung_khuyen_mai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('khuyen_mai_id');
            $table->bigInteger('san_pham_id');
            $table->bigInteger('dat_hang_id');
            $table->decimal('tong_tien',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ap_dung_khuyen_mai');
    }
};
