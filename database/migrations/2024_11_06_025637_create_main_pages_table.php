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
        Schema::create('main_pages', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->string('image')->nullable();
            $table->json('box_1_title')->nullable();
            $table->json('box_1_counter')->nullable();
            $table->json('box_2_title')->nullable();
            $table->json('box_2_counter')->nullable();
            $table->json('box_3_title')->nullable();
            $table->json('box_3_counter')->nullable();
            $table->tinyInteger('image_rotation')->default(0)->comment('0: Left, 1: Right');
            $table->boolean('status')->default(0)->comment('0: Inactive, 1: Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_pages');
    }
};
