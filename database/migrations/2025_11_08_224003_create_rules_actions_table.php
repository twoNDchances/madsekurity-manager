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
        Schema::create('rules_actions', function (Blueprint $table) {
            $table->unsignedBigInteger('order')->nullable();
            $table->foreignId('rule_id')->constrained('rules')->cascadeOnDelete();
            $table->foreignId('action_id')->constrained('actions')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules_actions');
    }
};
