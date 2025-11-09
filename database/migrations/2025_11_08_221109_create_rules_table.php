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
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->integer('phase');
            $table->foreignId('target_id')->nullable()->index()->constrained('targets')->nullOnDelete();
            $table->string('comparator');
            $table->boolean('is_inverse')->default(false);
            $table->json('configuration')->nullable();
            $table->foreignId('wordlist_id')->nullable()->index()->constrained('wordlists')->nullOnDelete();
            $table->longText('description')->nullable();
            $table->foreignId('user_id')->nullable()->index()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};
