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
        Schema::create('get_a_quotes', function (Blueprint $table) {
            $table->id();
            $table->string('describe_you');
            $table->string('budget');
            $table->string('looking_for');
            $table->text('pages_required')->nullable();
            $table->text('similar_websites')->nullable();
            $table->date('complete_project_by')->nullable();
            $table->text('any_other_details')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('email_address');
            $table->string('phone_number')->nullable();
            $table->string('your_brief')->nullable();
            $table->string('status')->nullable()->default('unread');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_a_quotes');
    }
};
