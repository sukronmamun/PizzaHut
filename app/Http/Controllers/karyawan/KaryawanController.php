<?php

namespace App\Http\Controllers\karyawan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cuti as Cuti;
use App\Karyawan;
use App\Manager;
use App\Jabatan as Jabatan;
use App\Bagian as Bagian;
use App\BagianInduk as BagianInduk;
use Mail;
use Config;
use Auth;

class KaryawanController extends Controller
{
    protected $data = array();
    protected $bagian;
    protected $sisaCuti;
    protected $totalCuti;

    public function __construct(Request $request)
    {
      // dd(Auth::guard('karyawan')->check());
      // $this->middleware('KaryawanAuth');
      // $this->middleware('KarwawanAuth')
      // ;
      // dd(auth()->check());
      if (! auth()->check()) {
        if (($request->ajax() && ! $request->pjax()) || $request->wantsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        } else {
            return redirect()->guest('/karyawan/login');
        }
      }

    }
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

       return view('karyawan.index',['tanggal'=>$hari,'banyak'=>$Banyak]);
    }



    public function getBagian(){
        return Auth::guard('karyawan')->user()->idBagian;
    }

    public function password(Request $request)
    {

      $oldPassword = $request->input('old-password');
      $newPassword = $request->input('new-password');
      $rePassword = $request->input('re-password');

      if ($newPassword == $rePassword) {
        $karyawan = Karyawan::where('nik',Auth::guard('karyawan')->user()->nik)->first();
        $karyawan->password = bcrypt($request->input('new-password'));
        $karyawan->save();
        $message = "Password Berhasil Di Simpam";
      }else{
        $message = "Password Tidak Sama";
      }

      return redirect('karyawan/home')->with('message',$message);
    }

    public function sendCuti(Request $request){
        $this->sendEmail($data);
    }

    public function Cuti(Request $request = null){
        $query = $request->input('nik');
        $Jabatan      = Jabatan::all();
        $Bagian       = Bagian::all();
        $BagianInduk  = BagianInduk::all();

        if ($query){

          $cuti = Cuti::where('mulaiCuti', 'LIKE', "%$query%")->where('karyawan_id', Auth::guard('karyawan')->user()->nik)->paginate(6);

        }else{

          $cuti = Cuti::where('karyawan_id',Auth::guard('karyawan')->user()->nik )->paginate(6);

        }

        return view('karyawan.cuti',['Karyawan'=>$cuti,'Jabatan'=>$Jabatan,'Bagian'=>$Bagian,'BagianInduk'=>$BagianInduk])->render();
    }
    public function ajukanCuti(Request $request)
    {
      $cekCuti = Cuti::where('status','Pandding')->count();
      if ($cekCuti == 0) {


      $data = [
        'name'=>'Sukron Mamun',
        'nik'=>Auth::guard('karyawan')->user()->nik,
        'jenisCuti'=> $request->input('jenisCuti'),
        'keterangan'=> $request->input('keterangan')
      ];

      Mail::send(['text'=>'Email'],$data,function($message){
        $message->to('sukronm888@gmail.com','Sukron Mamun')->subject('mengirim email dari laravel');
        $message->from('sukron.jamboo@gmail.com','sukron jamboo');
      });


      $tanggal   = explode('~', $request->input('tanggal'));
      $mulaiCuti = date_create(substr($tanggal[0],0,10));
      $batasCuti = date_create(substr($tanggal[1],1));
      $lamaCuti  = date_diff($mulaiCuti,$batasCuti);

      $pengajuanCuti = new Cuti();
      $pengajuanCuti->karyawan_id = Auth::guard('karyawan')->user()->nik;
      $pengajuanCuti->jenisCuti   = $request->input('jenisCuti');
      $pengajuanCuti->keterangan  = $request->input('keterangan');
      $pengajuanCuti->lamaCuti    = $lamaCuti->d;
      $pengajuanCuti->mulaiCuti   = $mulaiCuti;
      $pengajuanCuti->batasCuti   = $batasCuti;
      $pengajuanCuti->manager_id  = 0;
      $pengajuanCuti->status      = 'Pandding';
      $pengajuanCuti->save();
      $pesan = "Pesan Pengajuan Cuti Terkirim";
    }else{
      $pesan = "Anda masih memiliki Pengajuan Cuti yang belum di proses";
    }

    return redirect('/karyawan/home')->with('message',$pesan);
  }

    public function getEmail(){
        $email = array();
        $manager =  \App\Manager::where('idBagian',$this->getBagian())->get();

        foreach ($manager as $value) {
          array_push($email , $value->email);
        }

        return $email;
    }
}
