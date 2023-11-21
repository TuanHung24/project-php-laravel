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
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->id();
            $table->text('avatar_url')->nullable();
            $table->string("ho_ten",40)->collation("utf8_unicode_ci");
            $table->string("dien_thoai",10)->collation("utf8_unicode_ci")->nullable();
            $table->string("email",80)->collation("utf8_unicode_ci")->nullable();
            $table->string("dia_chi",128)->collation("utf8_unicode_ci")->nullable();
            $table->string("username",60)->collation("utf8_unicode_ci");
            $table->string("password",60)->collation("utf8_unicode_ci");
            $table->boolean("trang_thai")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_vien');
    }
};
