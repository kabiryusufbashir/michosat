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
        Schema::table('applicantresults', function (Blueprint $table) {
            $table->string('exam_type');
            $table->string('exam_no');
            $table->string('exam_year');
            $table->string('exam_center');
            $table->string('sitting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicantresults', function (Blueprint $table) {
            //
        });
    }
};
