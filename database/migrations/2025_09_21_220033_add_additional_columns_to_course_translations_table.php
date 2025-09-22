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
        Schema::table('course_translations', function (Blueprint $table) {
            $table->dropColumn(['overview', 'who_should_attend', 'prerequisites']);
            $table->dropColumn(['overview_image', 'who_should_attend_image', 'prerequisites_image', 'outcomes_image', 'exam_image']);
        });

        Schema::table('course_translations', function (Blueprint $table) {
            $table->text('overview')->nullable()->after('short_description');
            $table->text('who_should_attend')->nullable()->after('overview');
            $table->text('prerequisites')->nullable()->after('who_should_attend');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_translations', function (Blueprint $table) {
            $table->dropColumn(['overview', 'who_should_attend', 'prerequisites']);
            $table->dropColumn(['overview_image', 'who_should_attend_image', 'prerequisites_image', 'outcomes_image', 'exam_image']);
        });
    }
};
