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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('slug');
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(0)->comment('0: Inactive, 1: Active');
            $table->boolean('is_main_page')->default(0)->comment('0: Inactive, 1: Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
