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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meja_id');
            $table->unsignedBigInteger('menu_id');
            $table->string('nama_customer');
            $table->integer('jumlah');
            $table->string('status');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('meja_id')->references('id')->on('meja')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
