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
            $table->foreignId('quan_tri_id')->constrained('quan_tri');
            $table->string("khach_hang",60);
            $table->string("dien_thoai",10);
            $table->decimal("tong_tien",12,0)->nullable();
            $table->string("phuong_thuc_tt",60)->default('Tiền mặt');
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
