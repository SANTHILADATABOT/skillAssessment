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
        Schema::create('employees', function (Blueprint $table) {
	 	$table->id();
                $table->unsignedBigInteger('company_id');
                $table->string('employee_name');
                $table->string('employee_email');
                $table->string('employee_mobile');
                $table->string('employee_photo')->nullable();
		$table->string('employee_photo_path')->nullable();
                $table->string('employee_address')->nullable();
                $table->timestamps();
                $table->foreign('company_id','fk_emp_company_id')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
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
};
