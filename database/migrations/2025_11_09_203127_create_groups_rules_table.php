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
        Schema::create('groups_rules', function (Blueprint $table) {
            $table->unsignedBigInteger('order', true);
            $table->foreignId('group_id')->constrained('groups')->cascadeOnDelete();
            $table->foreignId('rule_id')->constrained('rules')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups_rules');
    }
};
