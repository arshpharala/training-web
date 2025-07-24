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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('banner')->nullable();
            $table->integer('position')->default(0);
            $table->integer('category_id');
            $table->boolean('is_guide')->default(0);
            $table->integer('created_by');
            $table->integer('is_featured');
            $table->string('color', 7)->nullable(); // HEX Color, e.g. #ff0000
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('news_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('news_id');
            $table->string('locale', 5)->index();
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
            $table->unique(['news_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
