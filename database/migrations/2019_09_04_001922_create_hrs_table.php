<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('division');
            $table->string('fullname');
            $table->string('posttitle');
			$table->string('photolocation');
            $table->string('salarylevel');
            $table->string('cursalarylevel');
            $table->date('dateofappointment');
            $table->date('dataofbirth');
            $table->string('gender');
            $table->string('appointmenttype');
            $table->string('qualification');
            $table->string('program');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hrs');
    }
}
