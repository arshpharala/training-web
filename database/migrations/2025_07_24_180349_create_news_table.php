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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->string('intro', 255);
            $table->longText('content');
            $table->unsignedBigInteger('category_id');
            $table->boolean('is_guide')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->softDeletes(); // If you want deleted_at support
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
