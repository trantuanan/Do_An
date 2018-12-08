<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khohang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('makho', 20)->unique();
            $table->string('name', 255);
            $table->string('phone', 15);
            $table->string('address', 255);
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
        Schema::dropIfExists('khohang');
    }
}
