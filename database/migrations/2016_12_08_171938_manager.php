<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Manager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nik')->unique();
            $table->integer('idBagian');
            $table->string('namadepan',20);
            $table->string('namaBelakang',20);
            $table->string('username');
            $table->string('password');
            $table->string('alamat',255);
            $table->string('jeniskelamin',1);
            $table->date('tglLahir');
            $table->string('agama',10);
            $table->string('noTpl',12);
            $table->date('joinDate');
            $table->string('avatar');
            $table->rememberToken();
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
        Schema::table('manager', function (Blueprint $table) {
            //
        });
    }
}
