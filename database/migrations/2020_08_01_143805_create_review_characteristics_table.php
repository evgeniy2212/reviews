<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_characteristics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('review_category_id')->unsigned();
            $table->string('name');
            $table->boolean('is_positive')->default(true);
            $table->boolean('is_published')->default(true);

            $table->foreign('review_category_id')->references('id')->on('review_categories')->onDelete('cascade');
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
        Schema::dropIfExists('review_characteristics');
    }
}
