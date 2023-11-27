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
        Schema::table('activities', function (Blueprint $table) {
            $table->json('title')->change();
            $table->json('description')->change();
            $table->timestamp('start_time')->nullable()->after('description');
            $table->timestamp('end_time')->nullable()->after('description');
            $table->string('hotel_name')->nullable()->after('description');
            $table->integer('city_id')->after('description');
            $table->dropColumn('meta_keys');
            $table->dropColumn('meta_description');
            $table->dropColumn('hotel');
            $table->dropColumn('city');
            $table->dropColumn('start_date');
            $table->dropColumn('stop_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            //
        });
    }
};
