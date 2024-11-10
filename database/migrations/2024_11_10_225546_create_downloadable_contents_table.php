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
        Schema::create('downloadable_contents', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('image');
            $table->json('file');
            $table->boolean('status')->default(false)->comment('0: unpublished, 1: published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('downloadable_contents');
    }
};
