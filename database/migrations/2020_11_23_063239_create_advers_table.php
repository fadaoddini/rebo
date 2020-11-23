<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lid');
            $table->string('title_link');
            $table->string('link');
            $table->string('image');
            $table->string('bgcolor');
            $table->tinyInteger('status');
            $table->tinyInteger('place');
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
        Schema::dropIfExists('advers');
    }
}
