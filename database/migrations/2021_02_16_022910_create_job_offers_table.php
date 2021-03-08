<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->integer('id_owner');
            $table->string('company');
            $table->string('token');
            $table->string('title');
            $table->string('salary');
            $table->longText('desc');
            $table->string('category');
            $table->string('keywords');
            $table->string('job_country');
            $table->string('state_province');
            $table->string('city');
            $table->string('time_needed');
            $table->string('speaking');
            $table->double('rank');
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
        Schema::dropIfExists('job_offers');
    }
}
