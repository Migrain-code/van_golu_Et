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
        Schema::create('sub_category_products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('meta_title')->nullable()->comment('seo başlık');
            $table->text('meta_description')->nullable()->comment('seo açıklama');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_category_products');
    }
};
