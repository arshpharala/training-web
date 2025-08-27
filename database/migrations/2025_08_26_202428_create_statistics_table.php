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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->integer(column: 'number');
            $table->string('icon');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('statistic_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('statistic_id');
            $table->string('locale', 5)->index();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
