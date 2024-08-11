<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporates', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('address');
            $table->bigInteger('phone')->nullable();
            $table->string('contact_person_name');
            $table->bigInteger('contact_person_phone');
            $table->bigInteger('contact_person_whatsapp');
            $table->string('contact_person_email')->nullable();
            $table->string('alter_contact_person_name')->nullable();
            $table->bigInteger('alter_contact_person_phone')->nullable();
            $table->bigInteger('alter_contact_person_whatsapp')->nullable();
            $table->string('alter_contact_person_email')->nullable();
            $table->string('industry_type')->nullable();
            $table->date('agreement_date')->nullable();
            $table->date('agreement_validity_date')->nullable();
            $table->string('name_corporate_under_bd')->nullable();
            $table->integer('pathology_discount')->nullable();
            $table->integer('radiology_imaging_discount')->nullable();
            $table->integer('ipd_discount')->nullable();
            $table->integer('covid_test_discount')->nullable();
            $table->string('privileged_service')->nullable();
            $table->string('cashless_service')->nullable();
            $table->string('status')->nullable();
            $table->string('force_active')->default('NO');
            
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
        Schema::dropIfExists('corporates');
    }
}
