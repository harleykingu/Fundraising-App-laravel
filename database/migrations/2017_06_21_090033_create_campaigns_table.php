<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned()->nullable();
            $table->String('cat_name');
            $table->timestamps();
        });

        Schema::create('campaigns', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->date('due_date');
            $table->string('image')->nullable();
            $table->text('content');
            $table->integer('goal');
            $table->integer('total');
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('status')->default('PENDING');
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
        Schema::dropIfExists('campaigns');
    }
}
