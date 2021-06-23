<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Data extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id(5);
            $table->text('jenis_kucing',30);
            $table->text('penjelasan');
            $table->integer('biaya_adopsi');
            $table->integer('perawatan',2);
            $table->integer('ling_hidup',2);
            $table->integer('sifat',2);
            $table->integer('penampilan',2);
            $table->integer('ketenaran',2);
            $table->text('foto');
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
        //
    }
}
