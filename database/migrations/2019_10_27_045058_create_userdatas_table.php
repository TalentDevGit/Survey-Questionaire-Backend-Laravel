<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('venue_name')->default('');
            $table->string('seat_cnt')->default('');
            $table->string('section_cnt')->default('');
            $table->string('stu_seat_cnt')->default('');
            $table->integer('is_holder')->default('1');
            $table->integer('is_wifi')->default('1');
            $table->integer('performance')->default('0');
            $table->string('holder_cnt')->default('');
            $table->string('holder_pos')->default('');
            $table->string('arm_width')->default('');
            $table->string('arm_kind')->default('');
            $table->string('rate')->default('');
            $table->string('others')->default('');
            $table->string('name1')->default('');
            $table->string('number1')->default('');
            $table->string('email1')->default('');
            $table->string('name2')->default('');
            $table->string('number2')->default('');
            $table->string('email2')->default('');
            $table->string('val1_1')->default('');
            $table->string('val1_2')->default('');
            $table->string('val1_3')->default('');
            $table->string('val1_4')->default('');
            $table->string('val2_1')->default('');
            $table->string('val2_2')->default('');
            $table->string('val2_3')->default('');
            $table->string('val2_4')->default('');
            $table->string('val3_1')->default('');
            $table->string('val3_2')->default('');
            $table->string('val3_3')->default('');
            $table->string('val3_4')->default('');
            $table->string('val4_1')->default('');
            $table->string('val4_2')->default('');
            $table->string('val4_3')->default('');
            $table->string('val4_4')->default('');
            $table->text('seat_pic');
            $table->text('seat_chart');
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
        Schema::dropIfExists('userdatas');
    }
}
