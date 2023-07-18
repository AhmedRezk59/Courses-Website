<?php

use App\Enums\CourseStatus;
use App\Models\Department;
use App\Models\Instructor;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Department::class)->nullOnDelete();
            $table->tinyText('trailer');
            $table->tinyText('thumbinal');
            $table->enum('status' , array_map(fn($s)=> $s->value,CourseStatus::cases()))->default(CourseStatus::PENDING->value);
            $table->boolean('is_paid');
            $table->decimal('price' , 7,2)->nullable();
            $table->decimal('discount_price' , 7 ,2)->nullable();
            $table->date('end_discount_date')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description');
            $table->text('references');
            $table->text('target_audience');
            $table->text('curriculum');
            $table->text('outputs');
            $table->foreignIdFor(Instructor::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
