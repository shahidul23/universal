<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->bigInteger('phone')->nullable();
            $table->integer('discount')->nullable();
            $table->string('service_type');
            $table->string('service_title');
            $table->string('availed');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();

            $table->timestamps();

            $table->foreign('service_id')
            ->references('id')
            ->on('services')
            ->onUpdate('cascade');

            $table->foreign('package_id')
            ->references('id')
            ->on('packages')
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
        Schema::dropIfExists('bookings');
    }
}
