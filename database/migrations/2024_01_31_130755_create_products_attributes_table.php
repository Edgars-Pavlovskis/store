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
        Schema::create('products_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id')->index();
            $table->unsignedBigInteger('attributes_id')->index();
            $table->string('value')->index();
            $table->timestamps();

            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('attributes_id')->references('id')->on('attributes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_attributes');
    }
};
