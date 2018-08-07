<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('camp_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('donation_id')->unsigned()->nullable();
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('transaction', function (Blueprint $table) {

          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('camp_id')->references('id')->on('campaigns');
          $table->foreign('donation_id')->references('id')->on('donations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
