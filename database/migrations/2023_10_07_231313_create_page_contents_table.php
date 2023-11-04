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
        Schema::create('page_contents', function (Blueprint $table) {
            /*$table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('backend_section_title');
            $table->integer('section_display_order');
            $table->string('section_template')->nullable();
            $table->text('section_content');
            $table->string('section_featured_image')->nullable();
            $table->boolean('use_featured_image_in_section')->default(false)->nullable();
            $table->timestamps();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');*/

            $table->id();
            $table->string('banner_title');
            $table->string('banner_image')->nullable();
            $table->text('banner_description')->nullable();
            $table->string('layout');
            $table->string('fe_title');
            $table->text('fe_content');
            $table->string('fe_image')->nullable();
            $table->string('fe_video')->nullable();
            $table->string('fe_banner_bg_colour');
            $table->string('fe_title_colour');
            $table->string('fe_content_colour');
            $table->string('fe_banner_template')->nullable();
            $table->unsignedBigInteger('page_id');

            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
