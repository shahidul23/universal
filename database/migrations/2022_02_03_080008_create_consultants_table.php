<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department');
            $table->string('designation');
            $table->string('degree');
            $table->string('saturday_chamber_time')->nullable();
            $table->string('sunday_chamber_time')->nullable();
            $table->string('monday_chamber_time')->nullable();
            $table->string('tuesday_chamber_time')->nullable();
            $table->string('wednesday_chamber_time')->nullable();
            $table->string('thursday_chamber_time')->nullable();
            $table->string('friday_chamber_time')->nullable();
            // $table->string('chamber_time');
            // $table->string('chamber_schedule');
            $table->integer('fee')->unsigned();
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
        Schema::dropIfExists('consultants');
    }
}
