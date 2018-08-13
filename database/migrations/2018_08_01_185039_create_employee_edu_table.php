<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeEduTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_edu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('edu_level');
            $table->string('division');
            $table->string('passing_year');
            $table->string('name_inst');
            $table->string('university');
            $table->integer('em_id');
            $table->integer('created_by');
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
        Schema::dropIfExists('employee_edu');
    }
}
