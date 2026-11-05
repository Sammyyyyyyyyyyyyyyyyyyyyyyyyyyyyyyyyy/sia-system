<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classroom_links', function (Blueprint $table) {
            $table->id();
            $table->string('block')->unique();
            $table->string('google_classroom_url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classroom_links');
    }
};