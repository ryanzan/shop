<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClothesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('shop_id')->unsigned();

            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')
                ->onDelete('cascade');

            $table->unsignedBigInteger('clothes_type_id')->unsigned();

            $table->foreign('clothes_type_id')
                ->references('id')
                ->on('clothes_types')
                ->onDelete('cascade');

            $table->string('name')->nullable();

            $table->string('gender')->nullable();
            $table->string('age_group')->nullable();
            $table->string('color')->nullable();
            $table->string('price')->nullable();
            $table->string('size')->nullable();

            $table->string('material')->nullable();

            $table->string('image')->nullable();

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
        Schema::dropIfExists('clothes');
    }
}
