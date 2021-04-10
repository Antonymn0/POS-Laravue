<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('first_name');
            $table->string('role');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('user_name')->nullable()->unique();           
            $table->string('email')->unique();
            $table->string('phone')->nullable();  
            $table->string('address')->nullable();
            $table->string('biography')->nullable();
            $table->string('password'); 
            $table->integer('id_number')->nullable()->unique(); 
            $table->string('passport_no')->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('physical_address')->nullable();
            $table->timestamp('suspended_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('id_verified_at')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('marital_status')->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('nhif_no')->nullable();
            $table->string('nssf_no')->nullable();
            $table->string('job_id')->nullable();
            $table->string('nationality')->nullable();
            $table->timestamp('employment_date')->nullable();
            $table->timestamp('termination_date')->nullable();
            $table->integer('approved_by')->nullable()->index();
            $table->integer('supervisor_id')->nullable()->index();
            $table->integer('registered_by')->nullable()->index();
            $table->integer('suspended_by')->nullable()->index();
            $table->string('avatar')->nullable();
            
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
        Schema::dropIfExists('users');
    }
}
