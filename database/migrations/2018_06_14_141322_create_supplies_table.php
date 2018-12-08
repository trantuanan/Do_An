<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mavt', 20)->unique();
            $table->string('name', 255);
            $table->text('mota',16000)->nullable();
            $table->string('mausac', 255)->nullable();
            $table->string('thuonghieu', 255)->nullable();
            $table->tinyInteger('loaivt')->default(1);
            $table->decimal('dongia', 13, 2);
            $table->string('donvi', 255)->default('Cái');
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
        Schema::dropIfExists('supplies');
    }
}
