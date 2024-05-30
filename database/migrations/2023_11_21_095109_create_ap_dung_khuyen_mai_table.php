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
           
            $table->foreignId('khuyen_mai_id')->constrained('khuyen_mai');

           
            $table->foreignId('san_pham_id')->constrained('san_pham');
            
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
