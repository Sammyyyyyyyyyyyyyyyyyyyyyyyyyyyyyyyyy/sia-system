<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_blocks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('activity_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('block', 10);

            $table->timestamps();

            $table->unique(['activity_id', 'block']);
            $table->index('block');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_blocks');
    }
};