<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupingByCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grouping_by_city', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('grouping_by_country');

            $table->integer('total_of_subscribers');
            $table->double('latitude', 9, 6);
            $table->double('longitude', 9, 6);
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
        Schema::dropIfExists('grouping_by_city');
    }
}
