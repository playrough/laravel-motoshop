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
        Schema::create('xemay', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loaixe_id')->constrained('loaixe');
            $table->foreignId('hangxe_id')->constrained('hangxe');
            $table->string('tenxe');
            $table->string('tenxe_slug');
            $table->integer('soluong');
            $table->double('dongia');
            $table->string('hinhanh')->nullable();
            $table->text('mota')->nullable();

            $table->string('dongco')->nullable();
            $table->string('dungtich')->nullable();
            $table->string('namsanxuat')->nullable();
            $table->string('mausac')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xemay');
    }
};
