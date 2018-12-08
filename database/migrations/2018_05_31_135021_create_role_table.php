<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TenPQ',50);
            $table->boolean('Q1_1')->default(false);
            $table->boolean('Q1_2')->default(false);
            $table->boolean('Q1_3')->default(false);
            $table->boolean('Q1_4')->default(false);
            $table->boolean('Q2_1')->default(false);
            $table->boolean('Q2_2')->default(false);
            $table->boolean('Q2_3')->default(false);
            $table->boolean('Q2_4')->default(false);
            $table->boolean('Q2_5')->default(false);
            $table->boolean('Q3_1')->default(false);
            $table->boolean('Q3_2')->default(false);
            $table->boolean('Q3_3')->default(false);
            $table->boolean('Q3_4')->default(false);
            $table->boolean('Q4_1')->default(false);
            $table->boolean('Q4_2')->default(false);
            $table->boolean('Q4_3')->default(false);
            $table->boolean('Q4_4')->default(false);
            $table->boolean('Q4_5')->default(false);
            $table->boolean('Q5_1')->default(false);
            $table->boolean('Q5_2')->default(false);
            $table->boolean('Q5_3')->default(false);
            $table->boolean('Q6_1')->default(false);
            $table->boolean('Q6_2')->default(false);
            $table->boolean('Q6_3')->default(false);
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
        Schema::dropIfExists('role');
    }
}
