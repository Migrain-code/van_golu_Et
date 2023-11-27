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
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('meta_keys');
            $table->dropColumn('meta_description');
            $table->dropColumn('description');
            $table->dropColumn('title');

            $table->json('meta_titles')->after('category_id');
            $table->json('descriptions')->after('category_id');
            $table->json('titles')->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
        });
    }
};
