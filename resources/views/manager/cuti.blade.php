<html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

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
      <script type="text/javascript" src="../assets/js/custem.js"></script>
      <script>
      window.setTimeout("waktu()",1000);
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var yy = date.getYear();
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var year = (yy < 1000) ? yy + 1900 : yy;
            var tanggalSekarang = day + " " + months[month] + " " + year+" ";

            function waktu() {

               setTimeout("waktu()",1000);
                var tanggal = new Date();
                document.getElementById("tanggalSekarang").innerHTML = tanggalSekarang;
                document.getElementById("jam").innerHTML = tanggal.getHours();
                document.getElementById("menit").innerHTML = tanggal.getMinutes();
                document.getElementById("detik").innerHTML = tanggal.getSeconds();
            }
      </script>
      <style media="screen">
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
                                <img class="responsive-img" src="../assets/images/{{ Auth::guard('manager')->user()->avatar }}">
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
                          <form id="search-form" action="{{ url('/manager/cuti') }}" method="post" style="display: none;">
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
                           <tr class="clickable-row" data-table="{{ $karyawan->Karyawan->nik }}">
                               <td> {{ $karyawan->Karyawan->nik }} </td>
                               <td> {{ $karyawan->Karyawan->namadepan ." ". $karyawan->Karyawan->namaBelakang }} </td>
                               <td> {{ $karyawan->Karyawan->alamat }} </td>
                               <td> {{ ( $karyawan->Karyawan->jeniskelamin  == 'L'?'Laki-Laki':'Perempuan') }} </td>
                               <td> {{ date('d M Y',strtotime($karyawan->Karyawan->tglLahir)) }} </td>
                               <td> {{ $karyawan->Karyawan->agama }} </td>
                               <td> {{ date('d M Y',strtotime($karyawan->Karyawan->joinDate)) }}</td>
                               @foreach($Jabatan as $jabatan)
                                 @if($jabatan->idJabatan == $karyawan->Karyawan->idJabatan )
                                 <td> {{ $jabatan->nama }} </td>
                                 @endif
                               @endforeach

                               @foreach($Bagian as $bagian)
                                 @if($bagian->idBagian == $karyawan->Karyawan->idBagian )
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
      <script type="text/javascript" src="../assets/js/app.js"></script>
      <script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../assets/js/materialize.min.js"></script>

      <script type="text/javascript">
      jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                var nik = $(this).attr('data-table');
                var tableDataEdit = $('.editDataKaryawan');
                var actionModal = $('.action-modal a[href=#hapus]').attr('href','/Manager/hapus/cuti/nik/'+nik);
                var approval = $('.action-modal a[href=#approval]').attr('href','/Manager/approval/nik/'+nik);

                $.get( "/Admin/getData/"+nik, function( data ) {
                  console.log( data );
                  tableDataEdit.html( data );

                 });

                 $('.ubahData').attr('data-init',nik);
                $('.modalF').modal('open');
            });
        });

      $(document).ready(function(){

        $('#search #search-input').keyup(function(){
          var dataNik = $(this).val();
            console.log(dataNik);
          $('#niksearch').val(dataNik)
        });

      $(".modal").modal();
      });
      </script>
    </body>
  </html>


   <!-- Modal Structure -->
   <div id="edit_table" class="modal modalF bottom-sheet  balas">
       <div class="modal-content aksi_footer">
           <div class="footer_aksi">
               <div class="icon_footer">
               <img src="../assets/images/return.png" class="modal-action modal-close" alt="">

               </div>
               <div class="table footer">
               <table class="mdl-data-table editDataKaryawan">

               </table>
               </div>
               <div class="button action-modal footer">
                 <a href="#hapus" class="btn radius button-color1" >Hapus</a>
                 <a href="#approval" class="btn radius button-color1" >approval Cuti</a>

               </div>
           </div>
         </div>

     </div>


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
