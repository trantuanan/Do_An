<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('madh', 20)->unique();
            $table->tinyInteger('trangthai')->default(1);
            $table->tinyInteger('tiendo')->default(1);
            $table->text('mota',16000)->nullable();
            $table->date('ngayht');
            $table->date('ngaytra');
            $table->string('address', 255);
            $table->string('phone', 15);
            $table->decimal('thanhtien', 13, 2);
            $table->tinyInteger('thue')->default(10);
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
        Schema::dropIfExists('bills');
    }
}
