<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->bigInteger('phone');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('department')->nullable();
            $table->unsignedBigInteger('consultant_id')->nullable();

            $table->timestamps();

            $table->foreign('consultant_id')
            ->references('id')
            ->on('consultants')
            ->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
