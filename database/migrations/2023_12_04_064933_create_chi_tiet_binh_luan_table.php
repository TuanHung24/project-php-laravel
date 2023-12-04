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
        Schema::create('chi_tiet_binh_luan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quan_tri_id');
            $table->text('noi_dung');
            $table->timestamp('ngay_tao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_binh_luan');
    }
};
