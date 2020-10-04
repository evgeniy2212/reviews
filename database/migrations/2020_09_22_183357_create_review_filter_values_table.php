<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewFilterValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_filter_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
            $table->string('slug');
            $table->bigInteger('filter_id')->unsigned();

            $table->foreign('filter_id')->references('id')->on('review_filters')->onDelete('cascade');
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
        Schema::dropIfExists('review_filter_values');
    }
}
