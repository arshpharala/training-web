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
        Schema::table('courses', function (Blueprint $table) {
            $table->text('overview_image')->nullable()->after('banner');
            $table->text('who_should_attend_image')->nullable()->after('overview_image');
            $table->text('prerequisites_image')->nullable()->after('who_should_attend_image');
            $table->text('outcomes_image')->nullable()->after('prerequisites_image');
            $table->text('exam_image')->nullable()->after('outcomes_image');
            $table->integer('level')->nullable()->after('exam_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['overview_image', 'who_should_attend_image', 'prerequisites_image', 'outcomes_image', 'exam_image', 'level']);
        });
    }
};
