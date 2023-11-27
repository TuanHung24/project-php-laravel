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
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('ten',50);
            $table->text('mo_ta')->collation("utf8_unicode_ci");
            $table->decimal('gia_ban',10,0)->default(0);
            $table->integer('so_luong')->default(0);
            $table->text('thong_tin')->collation("utf8_unicode_ci");
            $table->bigInteger('loai_san_pham_id');
            $table->boolean('trang_thai')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham');
    }
};
