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
            $table->string('state');
            $table->string('address');
            $table->string('photo');
            $table->string('programme');
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
