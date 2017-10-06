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
            $table->increments('id');
            $table->string('employee_fname');
            $table->string('employee_lname')->nullable();
            $table->enum('employee_gender',['Male', 'Female'])->default('Male');
            $table->string('employee_email');
            $table->string('employee_phone');
            $table->date('employee_birthday')->nullable();
            $table->string('employee_nid')->nullable();
            $table->text('employee_address')->nullable();
            $table->float('employee_salary')->nullable();
            $table->integer('edited_by')->nullable();
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
