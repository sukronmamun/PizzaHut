<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getDateCuti($a,$b,$s,$x)
    {

      $Hexport = '';
      //a
      $ExA = explode('-',$a);
      $HExA = $ExA[0].$ExA[1].$ExA[2];
      //b
      $ExB = explode('-',$b);
      $HExB = $ExB[0].$ExB[1].$ExB[2];
     //s
      $ExS = explode('-',$s);
      $HExS = $ExS[0].$ExS[1].$ExS[2];
      //x
      $ExSx = explode('-',$x);
      $HExSx = $ExSx[0].$ExSx[1].$ExSx[2];
      //mengelompokkan waktu cuti karyawan dengan waktu (s) s/d (x)
      for ($i=$HExA; $i <= $HExB; $i++) {

        //apabila Waktu kurang dari (s) atau melebihi (x) waktu tidak akan di tampilkan dalam graf
        if ($HExS <= $i && $HExSx >= $i) {
          // membuat pemisah waktu,
          if($Hexport != ''){
             $Hexport .= ','.$i;
          }else{
            $Hexport .= $i;

          }
        }
      }
      return $Hexport;

    }


    public function getDataMinggu($minggu,$xe,$ex)
    {
      $ExS = explode('-',$xe);
      $HExS = $ExS[0].$ExS[1].$ExS[2];

      $ExSx = explode('-',$ex);
      $HExSx = $ExSx[0].$ExSx[1].$ExSx[2];

      $c2 = count($minggu);
      $r  = array();
      $e  = array();
      $f  = array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0);

      for ($x=$HExS; $x <= $HExSx ; $x++) {
        array_push($e,$x);
      }

      for ($b=0; $b < $c2; $b++) {
        $c = explode(',', $minggu[$b]);

        for ($d=0; $d < count($c) ; $d++) {
          $n = $c[$d];

            switch ($n) {
              case $e[0]:
                   $f[0] += 1;
                break;
              case $e[1]:
                   $f[1] += 1;
                break;
              case $e[2]:
                   $f[2] += 1;
                break;
              case $e[3]:
                   $f[3] += 1;
                break;
              case $e[4]:
                   $f[4] += 1;
                break;
              case $e[5]:
                   $f[5] += 1;
                break;
              case $e[6]:
                   $f[6] += 1;
                break;

            }
         }
      }

      return array('Tanggal'=>$e,'Banyak'=>$f);
    }

    public function satuMinggu()
    {
      $h1 = date('l',mktime(0,0,0,date('m'),date('d'),date('Y')));
      $h3 = date('l',mktime(0,0,0,date('m'),date('d')+1,date('Y')));
      $h2 = date('l',mktime(0,0,0,date('m'),date('d')+2,date('Y')));
      $h4 = date('l',mktime(0,0,0,date('m'),date('d')+3,date('Y')));
      $h5 = date('l',mktime(0,0,0,date('m'),date('d')+4,date('Y')));
      $h6 = date('l',mktime(0,0,0,date('m'),date('d')+5,date('Y')));
      $h7 = date('l',mktime(0,0,0,date('m'),date('d')+6,date('Y')));

      $formatJs = '[\''.$h1.'\',\''.$h2.'\',\''.$h3.'\',\''.$h4.'\',\''.$h5.'\',\''.$h6.'\',\''.$h7.'\']';
      return $formatJs;
    }
}
