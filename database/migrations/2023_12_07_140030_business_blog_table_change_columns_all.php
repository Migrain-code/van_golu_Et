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
        Schema::table('business_blogs', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('meta_keys');
            $table->dropColumn('meta_description');
            $table->dropColumn('title');
            $table->json('descriptions');
            $table->json('meta_titles');
            $table->json('titles');
            $table->json('slug')->change();
            $table->integer('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_blogs', function (Blueprint $table) {
            //
        });
    }
};
