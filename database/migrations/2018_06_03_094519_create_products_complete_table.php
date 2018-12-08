<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCompleteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_complete', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maspht', 20)->unique();
            $table->string('name', 255);
            $table->string('diadiem', 255);
            $table->date('thoigian');
            $table->text('mota',16000)->nullable();
            $table->tinyInteger('trangthai')->default(1);
            $table->string('anh',255)->default('default_avatar.jpg');
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
        Schema::dropIfExists('products_complete');
    }
}
