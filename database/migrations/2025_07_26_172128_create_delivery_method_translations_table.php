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
        Schema::create('delivery_method_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('delivery_method_id');
            $table->string('locale', 5)->index();
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
            $table->unique(['delivery_method_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_method_translations');
    }
};
