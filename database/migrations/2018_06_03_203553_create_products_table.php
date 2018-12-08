<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('masp', 20)->unique();
            $table->string('name', 255);
            $table->string('size', 255);
            $table->string('vatlieu', 255)->nullable();
            $table->tinyInteger('baohanh')->default(1);
            $table->tinyInteger('trangthai')->default(1);
            $table->text('mota',16000)->nullable();
            $table->decimal('dongia', 13, 2);
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
        Schema::dropIfExists('products');
    }
}
