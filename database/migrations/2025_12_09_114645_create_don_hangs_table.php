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
        Schema::create('donhang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('tinhtrang_id')->constrained('tinhtrang');
            $table->foreignId('xemay_id')->constrained('xemay');
            $table->string('dienthoaigiaohang', 20);
            $table->string('diachigiaohang');
            $table->double('dongia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donhang');
    }
};
