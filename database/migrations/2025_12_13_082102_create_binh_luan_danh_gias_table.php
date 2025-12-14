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
        Schema::create('binhluan_danhgia', function (Blueprint $table) {
            $table->id();

            // Bình luận gắn với đánh giá
            $table->foreignId('danhgia_id')
                ->constrained('danhgia')
                ->cascadeOnDelete();

            // Ai bình luận
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Nội dung bình luận
            $table->text('noidung');

            // Trạng thái duyệt / kích hoạt
            $table->unsignedTinyInteger('kiemduyet')->default(0);
            $table->unsignedTinyInteger('kichhoat')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binhluan_danhgia');
    }
};
