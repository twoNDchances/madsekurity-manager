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
        Schema::create('targets_engines', function (Blueprint $table) {
            $table->unsignedBigInteger('order', true);
            $table->foreignId('target_id')->constrained('targets')->cascadeOnDelete();
            $table->foreignId('engine_id')->constrained('engines')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('targets_engines');
    }
};
