<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_criterias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('criteria_parent_id');
            $table->foreign('criteria_parent_id')->references('id')->on('criteria_parents')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('criteria_parent_income_id');
            $table->foreign('criteria_parent_income_id')->references('id')->on('criteria_parent_incomes')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('criteria_other_id');
            $table->foreign('criteria_other_id')->references('id')->on('criteria_others')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_criterias');
    }
}
