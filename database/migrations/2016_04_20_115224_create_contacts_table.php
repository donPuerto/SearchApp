<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('imageUrl');
            $table->string('company');
            $table->string('job_title');
            $table->string('emailadd');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('street_address1');
            $table->string('street_address2');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
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
        Schema::drop('contacts');
    }
}
