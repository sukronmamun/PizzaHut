<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Karyawan as Karyawan;
use App\Jabatan as Jabatan;
use App\Bagian as Bagian;
use App\BagianInduk as BagianInduk;
use App\Cuti as Cuti;
use App\User as User;
use Image;
use Auth;
class AdminHomeController extends Controller
{


  /*
  * Halaman Home Admin
  * Di redirect Ke halaman home pada Admin
  * @return Array
  */
  public function index()
    {
      $Karyawan = new Karyawan;
      $Jabatan = new Jabatan;
      $Bagian = new Bagian;
      $BagianInduk = new BagianInduk;
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


      return view('admin.index', ['Karyawans' => $Karyawan, 'Jabatan'=>$Jabatan, 'Bagian'=>$Bagian, 'BagianInduk'=>$BagianInduk,'tanggal'=>$hari,'banyak'=>$Banyak]);
    }

    /*
    * Halaman Karyawan
    * Di redirect Ke halaman karyawan pada Admin
    * @return Array
    */
    public function karyawan(Request $request = null){
      $query = $request->input('nik');

      $Jabatan = Jabatan::all();
      $Bagian= Bagian::all();
      $BagianInduk = BagianInduk::all();

      if ($query){
        $Karyawan = Karyawan::where('nik', 'LIKE', "%$query%")->paginate(6);
      }else{
        $Karyawan = Karyawan::orderBy('nik', 'desc')->paginate(6);

      }

      return view('admin.karyawan', ['Karyawans' => $Karyawan, 'Jabatan'=>$Jabatan, 'Bagian'=>$Bagian, 'Bagianinduk'=>$BagianInduk]);
    }

    /*
    * Halaman Cuto Karyawan
    * Di redirect Ke halaman Cuti pada Admin
    * @return Array
    */
    public function cuti(Request $request = null){
      // $Karyawan = Karyawan::paginate(6);
      $query = $request->input('nik');

      $Jabatan = Jabatan::all();
      $Bagian= Bagian::all();
      $BagianInduk = BagianInduk::all();

      if ($query){

        $Karyawan = Karyawan::where('nik', 'LIKE', "%$query%")->paginate(6);
        $cuti = Cuti::where('status','Pandding')->where('karyawan_id', 'LIKE', "%$query%")->paginate(6);

      }else{

        $cuti = Cuti::where('status','Pandding')->paginate(6);
        $Karyawan = Karyawan::orderBy('nik', 'desc')->paginate(6);

      }



      return view('admin.cuti',  ['Karyawan' => $cuti, 'Jabatan'=>$Jabatan, 'Bagian'=>$Bagian, 'Bagianinduk'=>$BagianInduk]);
    }

    /*
    * Get Data Karyawan
    * Request NIK
    * Nik = int
    * @return array()
    */
    public function DataKaryawan($nik=null){
      $Karyawan = Karyawan::where('nik',$nik)->first();
      $Jabatan = Jabatan::where('idJabatan',$Karyawan->idJabatan)->first();
      $Bagian = Bagian::where('idBagian',$Karyawan->idBagian)->first();

      return ['Karyawan'=>$Karyawan,'Jabatan'=>$Jabatan,'Bagian'=>$Bagian];

    }
    public function editDataKaryawan(Request $request){
        $nik = $request->input('nik');
        $karyawan = Karyawan::where('nik',$nik)->first();

        if ( !empty( $request->file('avatar') ) ) {
          $file = $request->file('avatar');
          $filename = time().'.'.$file->getClientOriginalExtension();
          Image::make($file)->resize(100,100)->save(public_path('assets/images/'.$filename));
          $karyawan->avatar = $filename;

        }

        $karyawan->idJabatan = $request->input('jabatan');
        $karyawan->idBagian = $request->input('bagian');
        $karyawan->namadepan = ucfirst($request->input('namaDepan'));
        $karyawan->namaBelakang =  ucfirst($request->input('namaBelakang'));
        $karyawan->username = ucfirst(strtolower($request->input('namaDepan')).ucfirst(strtolower($request->input('namaBelakang'))));
        $karyawan->password = bcrypt('password');
        $karyawan->alamat = $request->input('alamat');
        $karyawan->jeniskelamin = $request->input('jenisKelamin');
        $karyawan->tglLahir = $this->formatTanggal($request->input('tglLahir'));
        $karyawan->agama = $request->input('agama');
        $karyawan->noTpl = $request->input('noTlp');
        $karyawan->joinDate = $this->formatTanggal($request->input('joinDate'));
        $karyawan->status = $request->input('status');
        $karyawan->munculCuti = $this->formatTanggal($request->input('munculCuti'));
        $karyawan->save();

        return redirect('/Admin/Karyawan')->with('message','Data Karyawan Telah diubah');
    }

    /*
    * Menaambah Data Karyawan
    * Request Input form
    * Di redirect Ke halaman karyawan pada admin
    * @return message
    */
    public function tambahkaryawan(Request $request){
      // dd($request->input());

      $file = $request->file('avatar');
      $filename = time().'.'.$file->getClientOriginalExtension();
      Image::make($file)->resize(100,100)->save(public_path('assets/images/'.$filename));

      $karyawan = new Karyawan();
      $karyawan->nik = $request->input('nik');
      $karyawan->idJabatan = $request->input('jabatan');
      $karyawan->idBagian = $request->input('bagian');
      $karyawan->namadepan = ucfirst($request->input('namaDepan'));
      $karyawan->namaBelakang =  ucfirst($request->input('namaBelakang'));
      $karyawan->username = ucfirst(strtolower($request->input('namaDepan')).ucfirst(strtolower($request->input('namaBelakang'))));
      $karyawan->password = bcrypt('password');
      $karyawan->alamat = $request->input('alamat');
      $karyawan->jeniskelamin = $request->input('jenisKelamin');
      $karyawan->tglLahir = $this->formatTanggal($request->input('tglLahir'));
      $karyawan->agama = $request->input('agama');
      $karyawan->noTpl = $request->input('noTlp');
      $karyawan->joinDate = $this->formatTanggal($request->input('joinDate'));
      $karyawan->status = $request->input('status');
      $karyawan->munculCuti = $this->formatTanggal($request->input('munculCuti'));
      $karyawan->avatar = $filename;
      $karyawan->save();

      return redirect('/Admin/Karyawan')->with('message','Data Karyawan Tersimpan');

    }

    /*
    * menghapus Data Karyawan Berdasarkan nik
    * $nik = int
    * Di redirect Ke halaman karyawan pada admin
    * @return message
    */
    public function hapusKaryawan($nik = null)
    {
      $Karyawan = Karyawan::where('nik',$nik)->first();
      $Karyawan->delete();
      return redirect('/Admin/Karyawan')->with('message','Karyawan Telah Dihapus');
    }

    /*
    * Mengambil Data Karyawan Berdasarkan nik
    * $nik = int
    * @return 1 data row table
    */
    public function getKaryawan($nik = null)
    {
      $Karyawan = Karyawan::where('nik',$nik)->first();
      $Jabatan = Jabatan::where('idJabatan',$Karyawan->idJabatan)->first();
      $Bagian = Bagian::where('idBagian',$Karyawan->idBagian)->first();

      $data = "<tr>
            <td>".$Karyawan->nik."</td>
            <td>".$Karyawan->namadepan.' '.$Karyawan->namaBelakang."</td>
            <td>".$Bagian->nama."</td>
            <td>".$Jabatan->nama."</td>
        </tr>";
      return $data;
    }

    /*
    *
    *
    */
    public function password(Request $request){
      $oldPassword = $request->input('old-password');
      $newPassword = $request->input('new-password');
      $rePassword = $request->input('re-password');

      if ($newPassword == $rePassword) {
        $id = Auth::user()->id;
        $admin = User::where('id', $id)->first();
        $admin->password = bcrypt($newPassword);
        $admin->save();

        $message = "Password Berhasil Di Simpam";
      }else{
        $message = "Password Tidak Sama";
      }


      return redirect('/Admin/Home')->with('Message',$message);
    }
    /* Edit Data Karyawann Untuk di Simpan
    *
    * @return array
    */
    public function editKaryawan(Request $request){
      $karyawan = new Karyawan();

      $karyawan->nik = $request->input('nik');
      $karyawan->idJabatan = $request->input('jabatan');
      $karyawan->idBagian = $request->input('bagian');
      $karyawan->namadepan = $request->input('namadepan');
      $karyawan->namaBelakang = $request->input('namaBelakang');
      $karyawan->username = $request->input('username');
      $karyawan->password = $request->input('password');
      $karyawan->alamat = $request->input('alamat');
      $karyawan->jeniskelamin = $request->input('jeniskelamin');
      $karyawan->tglLahir = $this->formatTanggal($request->input('tglLahir'));
      $karyawan->agama = $request->input('agama');
      $karyawan->noTpl = $request->input('noTpl');
      $karyawan->munculCuti = $this->formatTanggal($request->input('munculCuti'));
      $karyawan->joinDate = $this->formatTanggal($request->input('joinDate'));
      $karyawan->status = $request->input('status');
      $karyawan->avatar = $request->input('avatar');

      $karyawan->save();
    }

    /*
    * Fungsi format Tanggal
    * $data Tanggal
    * @return format tanggal [ yyyy-mm-dd ]
    */
    public function formatTanggal($data){
      $bulan = array(
        "January"=>'01',
        "February"=>'02',
        "March"=>'03',
        "April"=>'04',
        "Mey"=>'05',
        "June"=>'06',
        "July"=>'07',
        "August"=>'08',
        "September"=>'09',
        "October"=>'10',
        "November"=>'11',
        "December"=>'12'
      );

      $bulan1 = explode(',',$data);
      $bulan2 = explode(' ',$bulan1[0]);
      return $bulan1[1].'-'.$bulan[$bulan2[1]].'-'.$bulan2[0] ;
    }

}
