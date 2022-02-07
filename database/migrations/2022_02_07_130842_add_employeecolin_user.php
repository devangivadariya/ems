<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeecolinUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'first_name'); 
            $table->string('last_name')->nullable();
            $table->string('user_name');
            $table->string('employee_id')->nullable();
            $table->date('joing_date')->nullable();
            $table->string('phone_no')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('designation_id')->nullable();
            $table->integer('company_id')->nullable(); 
			$table->bigInteger('role_id')->nullable()->unsigned();
			$table->bigInteger('man_id')->nullable()->unsigned();			
			$table->tinyInteger('perfomance_status')->default(0)->comment("0=>incomplete, 1=>complete");
			$table->tinyInteger('gender')->default(0)->comment("0=>male , 1=>female ,2 =>others")->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
