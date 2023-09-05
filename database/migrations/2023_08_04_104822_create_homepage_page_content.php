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
        Schema::create('homepage_page_content', function (Blueprint $table) {
            $table->id();
            $table->string('hero_banner_main_title');
            $table->string('hero_banner_tw_static_text');
            $table->text('hero_banner_tw_main_text');
            $table->string('hero_banner_button_one_text');
            $table->string('hero_banner_button_one_link');
            $table->string('hero_banner_button_two_text');
            $table->string('hero_banner_button_two_link');
            $table->string('about_banner_main_title');
            $table->text('about_banner_content');
            $table->string('about_banner_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_page_content');
    }
};
