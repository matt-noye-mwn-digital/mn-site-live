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
        Schema::create('portfolio', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->string('tagline')->nullable();
            $table->string('featured_image');
            $table->string('services_used');
            $table->text('the_brief')->nullable();
            $table->string('website_link')->nullable();
            $table->string('mobile_desktop_tablet_image')->nullable();
            $table->text('testimonial_content')->nullable();
            $table->string('testimonial_author')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};
