<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('date');
            $table->string('mailsubject');
            $table->string('letterdated');
            $table->string('sender');
            $table->string('department');
            $table->string('codenumber');
            $table->string('concernofficer');
            $table->string('letterurl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mrs');
    }
}
