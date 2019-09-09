<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('family_name');
            $table->string('middle_name');
            $table->string('given_name');
            $table->date('dob');
            $table->string('pob');
            $table->string('identity_document');
            $table->string('identity_number');
            $table->string('passport_issued_country');
            $table->date('issued_date');
            $table->date('expired_date');
            $table->string('email');
            $table->string('phone');
            $table->string('why_open_account');
            $table->string('know_by');
            $table->string('professional_situation');
            $table->string('position');
            $table->string('company_name');
            $table->string('business_type');
            $table->string('source_of_income');
            $table->string('monthly_income');
            $table->string('main_nationality');
            $table->string('second_nationality');
            $table->unsignedBigInteger('branch_location_id')->nullable();
            $table->foreign('branch_location_id')->references('id')->on('branch_locations');
            $table->string('is_us_person');
            $table->string('cif');
            $table->string('reference_code');
            $table->string('acc_facility');
            $table->string('acc_currency');
            $table->string('acc_pin_number');
            $table->string('acc_your3_d_security');
            $table->string('acc_type');
            $table->string('acc_term_deposit');
            $table->string('house_number');
            $table->string('street');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->foreign('commune_id')->references('id')->on('communes');
            $table->unsignedBigInteger('village_id')->nullable();
            $table->foreign('village_id')->references('id')->on('villages');
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
        Schema::dropIfExists('customers');
    }
}
