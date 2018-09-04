<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('CASCADE')->onUpdate('RESTRICT');

            $table->string('vendor', 30);
            $table->string('model', 30);
            $table->integer('price');
            $table->string('description', 255);

            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')
            ->references('id')->on('statuses')
            ->onDelete('CASCADE')->onUpdate('RESTRICT');

            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')
            ->references('id')->on('types')
            ->onDelete('CASCADE')->onUpdate('RESTRICT');

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
        Schema::dropIfExists('vehicles');
    }
}
