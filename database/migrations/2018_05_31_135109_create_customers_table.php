<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('makh', 20)->unique();
            $table->string('mail_address', 100)->unique();
            $table->string('password', 255);
            $table->string('name', 255);
            $table->string('address', 255)->nullable();
            $table->string('phone', 15);
            $table->date('ngaysinh');
            $table->tinyInteger('gioitinh')->default(1);
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
