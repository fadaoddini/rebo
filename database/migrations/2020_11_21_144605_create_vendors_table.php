<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string("family");
            $table->string("email");
            $table->string("mobile")->unique();
            $table->string("adress");
            $table->string("pic");
            $table->string("video");
            $table->text("description");
            $table->tinyInteger("level")->default(0);
            $table->tinyInteger("status")->default(0);
            $table->bigInteger("emtiaz")->default(100);
            $table->bigInteger("kif")->default(1);  // 1 rebo ==> 10000 toman


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
        Schema::dropIfExists('vendors');
    }
}
