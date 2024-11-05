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
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('variant_id');
            $table->integer('variant_category_id');
            $table->double('price', 10, 2)->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('is_price')->default(0)->comment('ek fiyatı göster => 1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variations');
    }
};
