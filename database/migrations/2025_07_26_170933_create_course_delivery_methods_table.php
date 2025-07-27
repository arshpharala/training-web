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
        Schema::create('course_delivery_methods', function (Blueprint $table) {
            $table->integer('course_id');
            $table->integer('delivery_method_id');
            $table->unique(['course_id', 'delivery_method_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_delivery_methods');
    }
};
