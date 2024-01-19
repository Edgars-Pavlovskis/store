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
        Schema::create('attributes_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attributes_id')->index();
            $table->string('locale')->index();
            $table->string('name')->index();
            $table->json('options')->nullable();
            $table->timestamps();

            $table->foreign('attributes_id')->references('id')->on('attributes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes_translations');
    }
};
