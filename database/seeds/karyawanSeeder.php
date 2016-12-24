<?php

use Illuminate\Database\Seeder;
use App\Karyawan;
class karyawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('karyawan')->insert([
        'nik'=>'2011142164',
        'idJabatan'=>'1',
        'idBagian'=>'2',
        'namadepan'=>'karyawan',
        'namaBelakang'=>'pizza',
        'username'=>'karyawanPizza',
        'password'=> bcrypt('password'),
        'alamat'=>'Tangerang',
        'jeniskelamin'=>'L',
        'tglLahir'=>'1990-02-12',
        'agama'=>'islam',
        'noTpl'=>'08816199183',
        'joinDate'=>'2015-02-01',
        'status'=>'tetap',
        'avatar'=>'karyawan.jpg',
        ]);
    }
}
