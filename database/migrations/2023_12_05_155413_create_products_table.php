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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->json('descr')->nullable();
            $table->json('details')->nullable();
            $table->string('photo')->nullable();
            $table->json('images')->nullable();
            $table->string('code')->unique();
            $table->float('price', 6, 2)->index();
            $table->string('parent')->index();
            $table->boolean('active')->default(true)->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
