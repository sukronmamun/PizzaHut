<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
  protected $table = 'manager';
  protected $fillable = [
      'id',
      'nik',
      'idBagian',
      'namadepan',
      'namaBelakang',
      'email',
      'password',
      'alamat',
      'jeniskelamin',
      'tglLahir',
      'agama',
      'noTpl',
      'joinDate',
      'avatar',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];
}
