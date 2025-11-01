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
        Schema::create('wordlists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->enum('words_type', ['file', 'text']);
            $table->longText('words_file')->nullable();
            $table->longText('words_text')->nullable();
            $table->unsignedBigInteger('words_count')->nullable();
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
        Schema::dropIfExists('wordlists');
    }
};
