<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
           
            $table->string('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('bahan')->nullable();
            $table->integer('harga')->nullable();
            $table->double('rating')->nullable();
            $table->string('tipe')->nullable();
            $table->string('stok')->nullable();
            $table->string('keuntungan')->nullable();
            $table->text('picturePath')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('product');
    }
}
