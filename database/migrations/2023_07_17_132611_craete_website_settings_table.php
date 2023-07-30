<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('waited_lectures_name')->nullable();
            $table->string('current_lectures_name')->nullable();
            $table->string('contact_mail')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('banner')->nullable();
            $table->string('courses_cover')->nullable();
            $table->text('student');
            $table->text('student_image')->nullable();
            $table->text('employee');
            $table->text('employee_image')->nullable();
            $table->text('job_searcher');
            $table->text('job_searcher_image')->nullable();
            $table->text('knowledge_seeker');
            $table->text('knowledge_seeker_image')->nullable();
            $table->text('seen_lectures');
            $table->text('seen_lectures_image')->nullable();
            $table->text('training');
            $table->text('training_image')->nullable();
            $table->text('certificates');
            $table->text('certificates_image')->nullable();
            $table->text('community');
            $table->text('community_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_settings');
    }
};
