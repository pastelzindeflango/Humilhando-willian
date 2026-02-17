<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plan_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('plan_id')->constrained('plans')->cascadeOnDelete();
            $table->timestamp('purchased_at')->nullable();
            $table->timestamps();
            $table->primary(['user_id', 'plan_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plan_user');
    }
};
