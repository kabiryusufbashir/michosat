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
        Schema::create('applicantbios', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_email');
            $table->string('gender');
            $table->string('dob');
            $table->string('marital_status');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('lga');
            $table->string('state');
            $table->string('country');
            $table->string('kin_name');
            $table->string('kin_relation');
            $table->string('kin_phone');
            $table->string('kin_address');
            $table->string('kin_city');
            $table->string('kin_lga');
            $table->string('kin_state');
            $table->string('kin_country');
            $table->string('photo');
            $table->string('programme');
            $table->string('year');
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
        Schema::dropIfExists('applicantbios');
    }
};
