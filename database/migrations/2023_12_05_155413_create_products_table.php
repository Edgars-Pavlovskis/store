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
            $table->string('title')->nullable()->index();
            $table->text('description')->nullable();
            $table->text('details')->nullable();
            $table->string('image')->nullable();
            $table->string('gallery')->nullable();
            $table->json('images')->nullable();
            $table->string('code')->unique()->index();
            $table->float('price', 6, 2)->index();
            $table->string('parent')->index();
            $table->integer('stock')->unsigned();
            $table->json('variations')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('parent')->references('alias')->on('categories')->onDelete('cascade');
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
