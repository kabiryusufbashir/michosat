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
        Schema::table('applicantbios', function (Blueprint $table) {
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_phone')->nullable();
            $table->string('sponsor_address')->nullable();
            $table->string('sponsor_city')->nullable();
            $table->string('sponsor_lga')->nullable();
            $table->string('sponsor_state')->nullable();
            $table->string('sponsor_country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicantbios', function (Blueprint $table) {
            //
        });
    }
};
