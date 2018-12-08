<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiendosanxuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiendosanxuat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matdsx', 20)->unique();
            $table->tinyInteger('soluong')->default(1);
            $table->tinyInteger('conlai')->default(1);
            $table->date('ngaybd');
            $table->date('ngayht');
            $table->tinyInteger('tiendo')->default(1);
            $table->tinyInteger('trangthai')->default(1);
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
        Schema::dropIfExists('tiendosanxuat');
    }
}
