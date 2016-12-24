<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Bagian as Bagian;
class Bagianinduk extends Model
{
  protected $table = 'bagianinduk';
  protected $primaryKey = 'idInduk';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'idInduk','nama',
  ];
  public function databagian()
  {
      return $this->hasMany('App\Bagian');
  }


}
