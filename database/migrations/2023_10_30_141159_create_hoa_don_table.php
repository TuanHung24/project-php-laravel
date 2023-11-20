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
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("nhan_vien_id")->nullable();
            $table->string("khach_hang",60);
            $table->decimal("tong_tien",12,0)->nullable();
            $table->string("phuong_thuc_tt",60)->default("COD");
            $table->boolean("trang_thai")->default(1);
            $table->timestamp("ngay_tao");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_don');
    }
};
