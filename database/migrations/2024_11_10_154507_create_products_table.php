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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id')->index();
            $table->json('name')->nullable();
            $table->json('slug')->nullable();
            $table->json('description')->nullable();
            $table->json('advantage')->nullable();
            $table->json('technic')->nullable();
            $table->boolean('status')->default(false)->comment('0: Inactive, 1: Active');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
