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
        Schema::create('thong_tin_san_pham', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('san_pham_id');
            $table->string('do_phan_giai');
            $table->string('trong_luong');
            $table->string('bo_nho');
            $table->string('he_dieu_hang');
            $table->string('the_nho');
            $table->string('camera');
            $table->string('pin');
            $table->string('bao_hanh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_tin_san_pham');
    }
};
