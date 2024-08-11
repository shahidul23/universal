<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_directories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department');
            $table->string('unit_name');
            $table->bigInteger('unit_pabx_number')->nullable();
            $table->bigInteger('corporate_number')->nullable();
            $table->bigInteger('unit_cell_number')->nullable();
            $table->bigInteger('personal_number')->nullable();
            $table->bigInteger('alternative_number')->nullable();
            
            // $table->string('degree');
            // // $table->timestamp('chamber_time');
            // $table->string('chamber_time');
            // $table->string('chamber_schedule');
            // $table->integer('fee')->unsigned();
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
        Schema::dropIfExists('phone_directories');
    }
}
