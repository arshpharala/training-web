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
        Schema::create('accreditation_bodies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('shot_description');
            $table->string('icon')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('accreditations', function (Blueprint $table) {
            $table->id();
            $table->integer('accreditation_body_id');
            $table->string('name');
            $table->text('shot_description');
            $table->string('icon')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accreditations');
        Schema::dropIfExists('accreditation_bodies');
    }
};
