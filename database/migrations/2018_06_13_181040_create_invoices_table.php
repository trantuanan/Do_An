<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahd', 20)->unique();
            $table->decimal('thanhtien', 13, 2);
            $table->decimal('thanhtoan', 13, 2);
            $table->decimal('giamtru', 13, 2);
            $table->tinyInteger('thue')->default(10);
            $table->tinyInteger('trangthai')->default(1);
            $table->text('mota',16000)->nullable();
            $table->tinyInteger('loaitt')->default(1);
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
        Schema::dropIfExists('invoices');
    }
}
