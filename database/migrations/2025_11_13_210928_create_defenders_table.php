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
        Schema::create('defenders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->longText('url');
            $table->boolean('is_important')->default(false);
            $table->boolean('status')->default(false);
            $table->string('health_method')->default('get');
            $table->longText('health_path');
            $table->string('inspect_method')->default('get');
            $table->longText('inspect_path');
            $table->string('apply_method')->default('patch');
            $table->longText('apply_path');
            $table->string('revoke_method')->default('delete');
            $table->longText('revoke_path');
            $table->string('implement_method')->default('patch');
            $table->longText('implement_path');
            $table->string('suspend_method')->default('delete');
            $table->longText('suspend_path');
            $table->longText('certificate')->nullable();
            $table->longText('log')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('defenders');
    }
};
