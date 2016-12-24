<?php

use Illuminate\Database\Seeder;
use App\Manager;
class managerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('manager')->insert([
        'nik'=>'2011142164',
        'idBagian'=>'2',
        'namadepan'=>'manager',
        'namaBelakang'=>'pizza',
        'email'=>'managerPizza@mail.com',
        'password'=> bcrypt('password'),
        'alamat'=>'Tangerang',
        'jeniskelamin'=>'L',
        'tglLahir'=>'1990-02-12',
        'agama'=>'islam',
        'noTpl'=>'08816199183',
        'joinDate'=>'2015-02-01',
        'avatar'=>'manager.jpg',
        ]);
    }
}
