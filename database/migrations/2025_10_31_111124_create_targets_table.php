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
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->integer('phase');
            $table->enum('type', ['target', 'getter', 'header', 'query', 'body', 'file']);
            $table->enum('datatype', ['array', 'number', 'string']);
            $table->longText('description')->nullable();
            $table->boolean('is_mutable')->default(true);
            $table->foreignId('engine_id')->nullable()->index()->constrained('engines')->nullOnDelete();
            $table->foreignId('target_id')->nullable()->index()->constrained('targets')->nullOnDelete();
            $table->foreignId('wordlist_id')->nullable()->index()->constrained('wordlists')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->index()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('targets');
    }
};
