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
            $table->string('name', 255);
            $table->string('surname', 255);
            $table->string('street', 255);
            $table->string('city', 255);
            $table->string('zip', 255);
            $table->string('country', 255);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->string('comments', 500)->nullable();
            $table->json('delivery'); // JSON field for checkout.delivery array
            $table->json('company'); // JSON field for checkout.company array
            $table->json('cart'); // JSON field for cart array
            $table->timestamps();
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
