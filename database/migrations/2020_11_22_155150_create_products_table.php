<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lid');
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('user_id');
            $table->integer('hit')->default(1);
            $table->integer('takhfif')->default(0);
            $table->bigInteger('price')->default(0);
            $table->integer('likee')->default(1);
            $table->float('ratee')->default(2.5);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('vije')->default(0);
            $table->string('image');
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
        Schema::dropIfExists('products');
    }
}
