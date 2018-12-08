<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamloiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphamloi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maspl', 20)->unique();
            $table->tinyInteger('soluong')->default(1);
            $table->date('ngaybd');
            $table->date('ngayht');
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
        Schema::dropIfExists('sanphamloi');
    }
}
