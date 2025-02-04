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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug', 500)->nullable(true)->unique();
            $table->integer('quantity');
            $table->double('price');
            $table->integer('average_rating')->nullable(true);
            $table->integer('min_quant_to_buy')->nullable(true);
            $table->json('img_path')->nullable(true);
            $table->string('description', 255)->nullable(false);
            $table->foreignId('producer_id')->constrained()->onDelete('cascade')->references('id')->on('producer');
            $table->foreignId('product_category_id')->constrained()->onDelete('cascade')->references('id')->on('product_category');
            $table->foreignId('product_status_id')->constrained()->onDelete('cascade')->references('id')->on('product_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
