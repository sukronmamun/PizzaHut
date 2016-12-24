<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Karyawan as Karyawan;
use App\Jabatan as Jabatan;
use App\Cuti as Cuti;
use App\Bagian as Bagian;
use App\BagianInduk as BagianInduk;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $Jabatan = Jabatan::all();
        // $Bagian= Bagian::all();
        // $BagianInduk = BagianInduk::all();
        $TotalKaryawan = Karyawan::all()->count();
        View::share('TotalKaryawan',$TotalKaryawan);
        $TotalCutiApproval = Cuti::where('status','Cuti')->count();
        View::share('TotalCutiApproval',$TotalCutiApproval);
        $TotalCutiPanding = Cuti::where('status','Pandding')->count();
        View::share('TotalCutiPanding',$TotalCutiPanding);
        // View::share('Jabatan',$Jabatan);
        // View::share('Bagian',$Bagian);
        // View::share('BagianInduk',$BagianInduk);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
