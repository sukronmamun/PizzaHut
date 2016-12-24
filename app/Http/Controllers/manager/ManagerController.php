<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User as UserT;
use App\Karyawan as Karyawan;
use App\Cuti as Cuti;
use App\Jabatan as Jabatan;
use App\Bagian as Bagian;
use App\BagianInduk as BagianInduk;

class ManagerController extends Controller
{

  public function index(){
      $cuti = Cuti::where('status','Cuti')->get();

      $mulaiCuti = (string)date('Y-m-d',mktime(0,0,0,date('m'),date('d'),date('Y')));
      $batasCuti = (string)date('Y-m-d',mktime(0,0,0,date('m'),date('d')+7,date('Y')));

      $master = array();
      foreach ( $cuti as $cvalue ) {
        array_push( $master , $this->getDateCuti($cvalue->mulaiCuti,$cvalue->batasCuti, $mulaiCuti, $batasCuti) );

      }

       $minggu = $this->getDataMinggu($master, $mulaiCuti, $batasCuti);
       $Tanggal = '['.implode(', ',$minggu['Tanggal']).']';
       $Banyak = '['.implode(', ',$minggu['Banyak']).']';

       $hari = $this->satuMinggu();

       return view('manager.index', ['tanggal'=>$hari,'banyak'=>$Banyak]);
  }


  public function karyawan(Request $request = null){
      $query = $request->input('nik');
      $Jabatan = Jabatan::all();
      $Bagian= Bagian::all();
      $BagianInduk = BagianInduk::all();

          if ($query)
          {
              $karyawanP = Karyawan::where('nik', 'LIKE', "%$query%")->paginate(6);
          }
          else
          {
            $karyawanP = Karyawan::orderBy('nik', 'desc')->paginate(6);

          }

      return view('manager.karyawan',['Karyawan'=>$karyawanP,'Jabatan'=>$Jabatan,'Bagian'=>$Bagian,'BagianInduk'=>$BagianInduk])->render();
  }


  public function cuti(Request $request = null){
      $query = $request->input('nik');
      $Jabatan      = Jabatan::all();
      $Bagian       = Bagian::all();
      $BagianInduk  = BagianInduk::all();

      if ($query){

        $karyawanP = Karyawan::where('nik', 'LIKE', "%$query%")->paginate(6);
        $cuti = Cuti::where('status','Pandding')->where('karyawan_id', 'LIKE', "%$query%")->paginate(6);

      }else{

        $cuti = Cuti::where('status','Pandding')->paginate(6);
        $karyawanP = Karyawan::orderBy('nik', 'desc')->paginate(6);

      }

      return view('manager.cuti',['Karyawan'=>$cuti,'Jabatan'=>$Jabatan,'Bagian'=>$Bagian,'BagianInduk'=>$BagianInduk])->render();
  }


  public function hapusPengajuanCuti($nik){
      $cuti = Cuti::where('karyawan_id',$nik)->where('status','Pandding')->first();
      $cuti->delete();
      $message = "Karyawan dengan Nik ".$nik." status pandding telah di hapus";

      return redirect('/manager/cuti')->with('message',$message);
  }


  public function approval($nik){

      $dataCuti = Cuti::where('karyawan_id',$nik)->where('status','Pandding')->first();

      $cuti = Cuti::where('karyawan_id',$nik)->where('status','Pandding')->first();
      $cuti->status = 'Cuti';
      $cuti->manager_id = Auth::guard('manager')->user()->nik;
      $cuti->save();

      $karyawanCuti = Karyawan::where('nik',$nik)->first();
      $karyawanCuti->munculCuti = $dataCuti->batasCuti;
      $karyawanCuti->save();

      $message = "Karyawan dengan Nik ".$nik." Status menjadi Cuti";


      return redirect('/manager/cuti')->with('message',$message);
 }

 public function password(Request $request){

      $oldPassword = $request->input('old-password');
      $newPassword = $request->input('new-password');
      $rePassword = $request->input('re-password');

      if ($newPassword == $rePassword) {
        $manager = Manager::where('nik',Auth::guard('manager')->user()->nik)->first();
        $manager->password = bcrypt($request->input('new-password'));
        $manager->save();
        $message = "Password Berhasil Di Simpam";

      }else{
        $message = "Password Tidak Sama";

      }

    return redirect('manager/home')->with('message',$message);
  }

}
