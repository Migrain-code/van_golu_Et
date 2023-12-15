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
        Schema::table('support_responses', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->boolean('status')->after('support_request_id');
            $table->longText('answer')->nullable()->after('support_request_id');
            $table->longText('question')->after('support_request_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('support_responses', function (Blueprint $table) {
            //
        });
    }
};
