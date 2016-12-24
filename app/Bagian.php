<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BagianInduk as BagianInduk;
class Bagian extends Model
{
  protected $table = 'bagian';
  protected $primaryKey = 'idBagian';


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'idBagian','bagianinduk_id','nama',
  ];
  public function bagianinduk()
  {
    return $this->belongsToMany('App\Bagianinduk');
  }


}
