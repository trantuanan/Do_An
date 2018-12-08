<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYeucauxuatnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yeucauxuatnhap', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mayc', 20)->unique();
            $table->tinyInteger('loaiphieu')->default(1);
            $table->date('ngaylay');
            $table->text('mota',16000)->nullable();
            $table->decimal('thanhtien', 13, 2);
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
        Schema::dropIfExists('yeucauxuatnhap');
    }
}
