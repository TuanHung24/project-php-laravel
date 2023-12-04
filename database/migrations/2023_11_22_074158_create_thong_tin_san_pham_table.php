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
            $table->string('do_phan_giai',30);
            $table->string('man_hinh',50);
            $table->string('kich_thuoc',50);
            $table->string('trong_luong',10);
            $table->string('he_dieu_hanh',50);
            $table->string('camera',50);
            $table->string('pin',20);
            $table->string('ram',20);
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
