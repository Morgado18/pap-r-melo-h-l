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
        Schema::table('producer', function (Blueprint $table) {
            $table->foreignId('province_id')->constrained()->onDelete('cascade')->references('id')->on('province');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('producer', function (Blueprint $table) {
            //
        });
    }
};
