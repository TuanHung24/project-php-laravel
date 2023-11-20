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
        Schema::create('nha_cung_cap', function (Blueprint $table) {
            $table->id();
            $table->string("ten",80)->collation("utf8_unicode_ci");
            $table->string("dien_thoai",10)->collation("utf8_unicode_ci");
            $table->string("dia_chi",128)->collation("utf8_unicode_ci");
            $table->boolean("trang_thai")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nha_cung_cap');
    }
};
