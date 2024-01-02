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
        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_canonical_url')->nullable();
            $table->string('seo_property_type')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('seo_image')->nullable();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('post_cat_id')->nullable();
            $table->unsignedBigInteger('kb_article_id')->nullable();
            $table->unsignedBigInteger('kb_category_id')->nullable();
            $table->unsignedBigInteger('port_item_id')->nullable();
            $table->unsignedBigInteger('per_project_id')->nullable();
            $table->unsignedBigInteger('wid_id')->nullable();
            $table->unsignedBigInteger('www_id')->nullable();
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('post_cat_id')->references('id')->on('post_categories')->onDelete('cascade');
            $table->foreign('kb_article_id')->references('id')->on('knowledgebase_articles')->onDelete('cascade');
            $table->foreign('kb_category_id')->references('id')->on('knowledgebase_categories')->onDelete('cascade');
            $table->foreign('port_item_id')->references('id')->on('portfolio')->onDelete('cascade');
            $table->foreign('per_project_id')->references('id')->on('personal_projects')->onDelete('cascade');
            $table->foreign('wid_id')->references('id')->on('what_i_dos')->onDelete('cascade');
            $table->foreign('www_id')->references('id')->on('who_work_withs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_post_seos');
    }
};
