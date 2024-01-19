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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->index();
            $table->text('description')->nullable();
            $table->string('alias')->unique()->index();
            $table->string('parent_alias')->nullable()->index();
            $table->string('image')->nullable();
            $table->unsignedTinyInteger('priority')->default(0)->index();
            $table->tinyInteger('featured')->default('0')->index();
            $table->json('filters')->nullable();
            $table->timestamps();

        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_alias')->references('alias')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
