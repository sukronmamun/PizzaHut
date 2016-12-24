<html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../assets/css/app.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../assets/css/font-awesome.css"  media="screen,projection"/>

       <!--LIB Chart -->
       <link rel="stylesheet" href="../dist/chartist.min.css">
       <!-- <link rel="stylesheet" href="assets/css/chartist.css"> -->

       <link rel="stylesheet" href="../assets/css/dataTables.material.min.css">
       <link rel="stylesheet" href="../assets/css/material.min.css">

       <!--LIB font -->
       <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script type="text/javascript" src="../assets/js/custem.js"></script>
      <style media="screen">

      tr.clickable-row{
        opacity: 0;
        transition: 1s;
      }

      .content-paginetion{
        position: absolute;;
        padding:  10px 0;
        width: 100%;
        right: 0;
        text-align: right;
        border-radius: 3px;
        background-color: #fff;

      }

      .pagination li i{
        color: #ee6e73;

      }

      .pagination li.active{
        font-size: 1.2rem;
        color: #ee6e73;
        background-color: rgba(0, 0, 0,.1);
        line-height:30px;
      }

      .pagination li{
        padding: 0 10px;
      }

      .pagination li a{
        padding: 0;
      }
.dropdown-content{
  min-width: 180px;
  margin-top: 25px;
margin-left: 5px;
}

.modal-footer .margin-side,.modal-footer .margin-side{
  margin-left: 10px !important;
}
      </style>

    </head>
    <body id="karyawan">
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="#UbahPassword">Ubah Password</a></li>
        <li class="divider"></li>
        <li>
          <a href="{{ url('/manager/logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Keluar
          </a>
           <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
               {{ csrf_field() }}
           </form>
</li>
      </ul>

     <div class="row">
         <div id="head_cover">
             <div class="logo">
                 <img src="../assets/images/Pizza_hut_logo.gif" alt="">
             </div>
             <div class="status">
                 <p>
                     Selamat datang Admin ! dihalaman Pengajuan Cuti Online
                 </p>
                 <p>Pizza Hut Indonesia</p>
             </div>
             <div id="jam-digital">
                        <div class="tanggal">
                            <p id="tanggalSekarang"></p>
                        </div>
                        <div class="jam">
                            <p id="jam"></p>:
                            <p id="menit"></p>:
                            <p id="detik"></p>
                        </div>


                </div>
             <div class="setting">
               <a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="fa fa-cog" aria-hidden="true"></i></a>
             </div>
         </div>
     </div>
  <section id="admin_content">
        <div class="row">
             <div class="col s12 main-content">
                 <div class="contain setting-karyawan">
                    <div class="icon">
                        <div class="identitas">
                            <div class="img">
                                <img class="responsive-img"  src="../assets/images/{{ Auth::guard('manager')->user()->avatar }}">
                            </div>
                            <div class="identitas_admin">
                                <div class="nama">{{ ucfirst(Auth::guard('manager')->user()->namadepan) }} {{ ucfirst(Auth::guard('manager')->user()->namaBelakang) }}</div>
                                <div class="status_jabatan">
                                     Manager
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="icon">
                        <section id="search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input id="search-input" class="form-control input-lg" onchange="document.getElementById('search-form').submit();">
                            <form id="search-form" action="{{ url('/manager/karyawan') }}" method="post" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="nik" id="niksearch" value="">
                            </form>

                        </section>
                    </div>
                    <div class="icon">
                        <a href="{{ url('/manager/home') }}"><i class="fa fa-home" aria-hiddem="true"></i></a>
                    </div>
                    <div class="icon">
                        <a href="{{ url('/manager/karyawan') }}"><i class="fa fa-users" aria-hidden="true"></i></a>
                    </div>
                    <div class="icon">
                           <a href="{{ url('/manager/cuti') }}"><i class="fa fa-bar-chart-o"></i></a>
                    </div>


                 </div>
                 <div class="col s12">
                     <div class="col s12 graf-info-cuti">
                        <table id="example" class="mdl-data-table" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>ALAMAT</th>
                                <th>JENIS KELAMIN</th>
                                <th>TGL LAHIR</th>
                                <th>AGAMA</th>
                                <th>JOIN DATE</th>
                                <th>JABATAN</th>
                                <th>BAGIAN</th>

                            </tr>
                        </thead>
                        <tbody id="tableBody">
                          @foreach($Karyawan as $karyawan)
                            <tr class="clickable-row" data-table="{{ $karyawan->nik }}">
                                <td> {{ $karyawan->nik }} </td>
                                <td> {{ $karyawan->namadepan ." ". $karyawan->namaBelakang }} </td>
                                <td> {{ $karyawan->alamat }} </td>
                                <td> {{ ( $karyawan->jeniskelamin  == 'L'?'Laki-Laki':'Perempuan') }} </td>
                                <td> {{ date('d M Y',strtotime($karyawan->tglLahir)) }} </td>
                                <td> {{ $karyawan->agama }} </td>
                                <td> {{ date('d M Y',strtotime($karyawan->joinDate)) }}</td>

                                @foreach($Jabatan as $jabatan)
                                  @if($jabatan->idJabatan == $karyawan->idJabatan )
                                  <td> {{ $jabatan->nama }} </td>
                                  @endif
                                @endforeach

                                @foreach($Bagian as $bagian)
                                  @if($bagian->idBagian == $karyawan->idBagian )
                                  <td> {{ $bagian->nama }} </td>
                                  @endif
                                @endforeach

                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    {{ $Karyawan->links() }}
                  </div>
                 </div>
             </div>
          </div>
      </section>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
      <script>

            $(document).ready(function(){

              var tb = document.getElementById('tableBody');
              $('.modal').modal();

              $('select').material_select();

              $('.datepicker').pickadate({
                  selectMonths: true, // Creates a dropdown to control month
                  selectYears: 15 // Creates a dropdown of 15 years to control year
              });



              for (var i = 0; i < 7 ; i++) {
                var tr = $('tr.clickable-row:nth-child('+i+')');
                tr.css({'opacity':1,'transition':'all .3s ease-in-out'});
              }
            });

            $('#search #search-input').keyup(function(){
              var dataNik = $(this).val();
                console.log(dataNik);
              $('#niksearch').val(dataNik)
            });

      </script>
      <script type="text/javascript" src="../assets/js/app.js"></script>
    </body>
</html>

<!-- Modal Structure -->
<!-- Modal Structure -->




  <div id="UbahPassword" class="modal modal-fixed-footer ">
  <form method="POST" id="mulaiAjukanCuti" action="{{ url('/manager/password') }}">
  {{ csrf_field() }}
      <div class="modal-content">
            <h2>Ubah Sandi</h2>
      <div class="input-field col s12 margin">
        <input  id="old-password"name="old-password" type="password" class="validate">
        <label for="old-password">Sandi Lama</label>
      </div>
      <div class="input-field col s12">
        <input  id="new-pasword" type="password" name="new-password" class="validate">
        <label for="new-pasword">Sandi Baru</label>
      </div>
      <div class="input-field col s12">
        <input  id="re-password" type="password" name="re-password" class="validate">
        <label for="re-password">Ketik Ulang Sandi</label>
      </div>


      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-primary margin-side" name="simpan-password" value="Simpan"> &nbsp;&nbsp;&nbsp;
      <button class="modal-action modal-close btn btn-primary margin-side">Kembali</button>
    </div>
    </form>
    </div>
