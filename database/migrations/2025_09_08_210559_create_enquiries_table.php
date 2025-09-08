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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('email');
            $table->text('phone')->nullable();
            $table->string('country', 5);
            $table->string('funding')->nullable();
            $table->text('company')->nullable();
            $table->string('role')->nullable();
            $table->string('course')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('delivery_method_id')->nullable();
            $table->string('delivery_method')->nullable();

            // Extra fields
            $table->string('group_size')->nullable();
            $table->string('delivery_mode')->nullable();
            $table->string('start_timeline')->nullable();
            $table->string('budget_range')->nullable();
            $table->boolean('need_quote')->default(false);
            $table->string('contact_channel')->nullable();
            $table->string('contact_time')->nullable();
            $table->string('heard_about')->nullable();
            $table->text('message')->nullable();

            // Consents + GDPR
            $table->boolean('marketing_opt_in')->default(false);
            $table->boolean('consent')->default(false);

            // Tracking
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_term')->nullable();
            $table->string('utm_content')->nullable();
            $table->string('url')->nullable();

            // Client info
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('device')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
