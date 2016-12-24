<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
// use App\Cuti as Cuti;
class Karyawan extends Model
{
    protected $table = 'karyawan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik','idJabatan','idBagian','namadepan','namaBelakang','username','password','alamat','jeniskelamin','tglLahir','agama','noTpl','joinDate','status','munculCuti','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

public function Cuti()
{
 return  $this->hasMany('App\Cuti','nik', 'karyawan_id');
  # code...
}

}
