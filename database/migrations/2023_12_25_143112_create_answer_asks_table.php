<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerAsksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_asks', function (Blueprint $table) {
            $table->id();
            $table->boolean("ans1")->default(false);
            $table->boolean("ans2")->default(false);;
            $table->boolean("ans3")->default(false);;
            $table->text("res1");
            $table->text("res2");
            $table->text("res3");
            $table->text("ask_id");
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
        Schema::dropIfExists('answer_asks');
    }
}
