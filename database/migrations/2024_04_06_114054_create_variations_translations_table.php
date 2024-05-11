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
        Schema::create('variations_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_variations_id')->index();
            $table->unsignedBigInteger('record_id')->nullable()->index();
            $table->string('locale')->index();
            $table->string('name')->index();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('products_variations_id')->references('id')->on('products_variations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variations_translations');
    }
};
