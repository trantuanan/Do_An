<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mail_address', 100)->unique();
            $table->string('password', 255);
            $table->string('name', 255);
            $table->string('address', 255);
            $table->string('phone', 15);
            $table->date('ngaysinh');
            $table->string('cmnd',20);
            $table->tinyInteger('gioitinh')->default(1);
            $table->string('anh',255)->default('default_avatar.jpg');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
