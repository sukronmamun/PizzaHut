<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
             $table->increments('idCuti');
             $table->integer('nik');
             $table->string('jenisCuti',50);
             $table->text('keterangan');
             $table->integer('lamaCuti');
             $table->date('mulaiCuti');
             $table->date('batasCuti');
             $table->integer('idManager');
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
        Schema::drop('cuti');
    }
}
