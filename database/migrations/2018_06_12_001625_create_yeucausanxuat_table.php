<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYeucausanxuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yeucausanxuat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maycsx', 20)->unique();
            $table->string('name', 255);
            $table->date('ngayhen');
            $table->date('ngaytra');
            $table->tinyInteger('trangthai')->default(1);
            $table->text('mota',16000)->nullable();
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
        Schema::dropIfExists('yeucausanxuat');
    }
}
