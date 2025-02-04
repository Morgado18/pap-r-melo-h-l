<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('producer', function (Blueprint $table) {
            $table->id();
            $table->string('nif');
            $table->string('company_name')->nullable(true);
            $table->string('phone_number');
            $table->string('address');
            $table->string('address_reference')->nullable(true);
            $table->string('description')->nullable(true);
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producers');
    }
};
