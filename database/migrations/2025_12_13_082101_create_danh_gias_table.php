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
        Schema::create('danhgia', function (Blueprint $table) {
            $table->id();

            // Xe máy được đánh giá
            $table->foreignId('xemay_id')
                ->constrained('xemay')
                ->cascadeOnDelete();

            // Người viết đánh giá
            $table->foreignId('user_id')
                ->constrained('users');

            // Nội dung đánh giá
            $table->string('tieude');
            $table->string('tieude_slug');
            $table->unsignedTinyInteger('sosao')->default(5);
            $table->text('noidung');

            // Thống kê & trạng thái
            $table->unsignedInteger('luotxem')->default(0);
            $table->unsignedTinyInteger('kiemduyet')->default(1);
            $table->unsignedTinyInteger('kichhoat')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhgia');
    }
};
