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
            $table->string('surname');
            $table->string('other_name');
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->date('dob')->nullable();
            $table->enum('sex', ['Male', 'Female'])->nullable();
            $table->enum('marital_status', ['Single', 'Married'])->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('zone')->nullable();
            $table->string('sec_sch')->nullable();
            $table->string('uni_sch')->nullable();
            $table->string('other_sch')->nullable();
            $table->string('prof_qualification')->nullable();
            $table->string('present_org')->nullable();
            $table->string('present_appointment')->nullable();
            $table->string('area_specs')->nullable();
            $table->string('other_info')->nullable();
            $table->string('referees')->nullable();
            $table->enum('acc_status', ['Updated', 'Notupdated'])->default('Notupdated');
            $table->enum('status', ['Active', 'Inactive', 'Deleted'])->default('Active');
            $table->enum('role', ['Admin', 'Member'])->default('Member');
            $table->string('member')->default('None');
            $table->rememberToken();
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
