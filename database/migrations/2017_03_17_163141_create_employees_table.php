<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name', 60);
            $table->string('name_bangla', 60);
            $table->string('father', 60);
            $table->string('mother', 120);
            $table->string('pre_address', 255);
            $table->string('per_address', 255);
            $table->integer('country_id')->unsigned();
            $table->string('mobile');
            $table->integer('nid');
            $table->string('department', 120);
            $table->string('designation', 120);
            $table->string('work_place', 120);
            $table->string('computer_skill');
            $table->string('email');
            $table->date('dob');
            $table->date('date_hired');
            $table->string('picture', 60);
            $table->integer('status');
            $table->integer('user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
