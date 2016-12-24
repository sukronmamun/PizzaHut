<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Karyawan as Karyawan;
class Cuti extends Model
{
    Protected $table = 'cuti';
    protected $primaryKey = 'idCuti';

    protected $fillable = [
    'idCuti', 'karyawan_id', 'jenisCuti', 'keterangan', 'lamaCuti', 'mulaiCuti', 'batasCuti', 'manager_id',
  ];

  public function Karyawan()
  {
      return $this->belongsTo('App\Karyawan','karyawan_id', 'nik');
  }

}
