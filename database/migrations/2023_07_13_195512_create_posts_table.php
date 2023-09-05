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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('featured_image')->nullable();
            $table->text('main_content');
            $table->text('excerpt');
            $table->boolean('published')->default(0);
            $table->string('page_type')->default('article')->nullable();
            $table->text('page_description')->nullable();
            $table->text('page_keywords')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->json('tags')->nullable;
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('post_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
