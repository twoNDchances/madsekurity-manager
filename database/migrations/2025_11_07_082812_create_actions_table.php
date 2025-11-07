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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->string('type');
            $table->json('configuration')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('wordlist_id')->nullable()->index()->constrained('wordlists')->nullOnDelete();
            $table->foreignId('content_id')->nullable()->index()->constrained('contents')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->index()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
