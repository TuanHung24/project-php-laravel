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
        Schema::create('chi_tiet_san_pham', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("san_pham_id");
            $table->decimal("gia_ban",10,0);
            $table->integer("so_luong");
            $table->text('mo_ta')->collation("utf8_unicode_ci");
            $table->boolean("trang_thai")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_san_pham');
    }
};
