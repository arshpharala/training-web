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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('accreditation_body_id')->nullable();
            $table->string('slug'); // Unique by validation
            $table->integer('position')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('icon')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('color', 7)->nullable(); // HEX Color, e.g. #ff0000
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('topic_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('topic_id');
            $table->string('locale', 5)->index();
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
            $table->unique(['topic_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic_translations');
        Schema::dropIfExists('topics');
    }
};
