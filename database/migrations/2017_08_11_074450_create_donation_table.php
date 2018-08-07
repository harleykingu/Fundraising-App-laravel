<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned()->null();
          $table->integer('amount');
          $table->integer('campaign_id')->unsigned()->null();
          $table->timestamps();
        });

        Schema::table('donations', function (Blueprint $table) {

          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('campaign_id')->references('id')->on('campaigns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Donations');
    }
}
