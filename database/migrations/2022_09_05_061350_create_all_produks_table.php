<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_produks', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignId('category_id');
            $table->text('deskripsi');
            $table->string('slug')->unique();
            $table->string('harga');
            $table->string('nama');
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
        Schema::dropIfExists('all_produks');
    }
}
