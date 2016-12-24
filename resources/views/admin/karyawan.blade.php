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
       <link rel="stylesheet" href="../assets/css/responsive.css">

       <!--LIB font -->
       <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script type="text/javascript" src="../assets/js/custem.js"></script>
      <style media="screen">
        .pagination{
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
          <a href="{{ url('/logout') }}" onclick="event.preventDefault();
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
                                <img class="responsive-img"  src="../assets/images/{{ Auth::user()->avatar }}">
                            </div>
                            <div class="identitas_admin">
                              <div class="name">{{ Auth::user()->name }}</div>
                                <div class="status_jabatan">
                                     Admin
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="icon">
                      <section id="search">
                          <i class="fa fa-search" aria-hidden="true"></i>
                          <input id="search-input" class="form-control input-lg" onchange="document.getElementById('search-form').submit();">
                          <form id="search-form" action="{{ url('/Admin/Karyawan') }}" method="post" style="display: none;">
                              {{ csrf_field() }}
                              <input type="hidden" name="nik" id="niksearch" value="">
                          </form>

                      </section>
                    </div>
                    <div class="icon">
                        <a href="{{ url('/Admin/Home') }}"><i class="fa fa-home" aria-hiddem="true"></i></a>
                    </div>
                    <div class="icon">
                        <a href="{{ url('/Admin/Karyawan') }}"><i class="fa fa-users" aria-hidden="true"></i></a>
                    </div>
                    <div class="icon">
                           <a href="{{ url('/Admin/Cuti') }}"><i class="fa fa-bar-chart-o"></i></a>
                    </div>
                     <div class="icon">
                        <a href="#tambah_data" class="modal-trigger btn btn-primary radius">Tambah</a>
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

                          <tbody>


                              @foreach($Karyawans as $karyawan)
                                <tr class="clickable-row" data-table="{{ $karyawan->nik }}">
                                    <td> {{ $karyawan->nik }} </td>
                                    <td> {{ $karyawan->namadepan ." ". $karyawan->namaBelakang }} </td>
                                    <td> {{ $karyawan->alamat }} </td>
                                    <td> {{ ( $karyawan->jeniskelamin  == 'L'?'Laki-Laki':'Perempuan') }} </td>
                                    <td> {{ date('d M Y',strtotime($karyawan->tglLahir)) }} </td>
                                    <td> {{ $karyawan->agama }} </td>
                                    <td> {{ date('d M Y',strtotime($karyawan->joinDate)) }} </td>

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
                      {{ $Karyawans->links() }}

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

            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
              $('.modal').modal();
              $('.ubahData').click(function(){
                var nik = $(this).attr('data-init');

                $.get("/Admin/editDataKaryawan/"+nik,
                      function(data){
                        // console.log(data);
                    // Nik
                        $('.form-ubah-data #nik').val(data.Karyawan.nik).attr('class','validate valid');
                        $('.form-ubah-data label[for=nik]').attr('class','active');

                  //  Nama Depan
                        $('.form-ubah-data #namaDepan').val(data.Karyawan.namadepan).attr('class','validate valid');
                        $('.form-ubah-data label[for=namaDepan]').attr('class','active');

                  // Nama Belakang
                        $('.form-ubah-data #namaBelakang').val(data.Karyawan.namaBelakang).attr('class','validate valid');
                        $('.form-ubah-data label[for=namaBelakang]').attr('class','active');

                  // Alamat
                        $('.form-ubah-data #alamat').val(data.Karyawan.alamat);
                        $('.form-ubah-data label[for=alamat]').attr('class','active');

                  // Jenis Kelamin
                        $(".form-ubah-data #jenisKelamin").val(data.Karyawan.jeniskelamin).material_select();

                  // Tanggal Lahir
                        var $input = $('.form-ubah-data #tglLahir').pickadate();
                        var picker = $input.pickadate('picker');
                        picker.set('select', data.Karyawan.tglLahir, { format: 'yyyy-mm-dd' });
                        $('.input-file-custem2').css({'background-image':'url(../assets/images/'+data.Karyawan.avatar+')','background-size':'cover'});
                  //  Agama
                        $(".form-ubah-data #agama").val(data.Karyawan.agama).material_select();

                  //  Nomer telepon
                        $('.form-ubah-data #noTlp').val(data.Karyawan.noTpl);
                        $('.form-ubah-data label[for=noTlp]').attr('class','active');

                  // Tanggal Lahir
                        var $input = $('.form-ubah-data #joinDate').pickadate();
                        var picker = $input.pickadate('picker');
                        picker.set('select', data.Karyawan.joinDate, { format: 'yyyy-mm-dd' });
                  // Status
                        $('.form-ubah-data #status').val(data.Karyawan.status).material_select();
                  //Jabatan name
                        $('.form-ubah-data #jabatan').val(data.Karyawan.idJabatan).material_select();
                 //Bagian Name
                        $('.form-ubah-data #bagian').val(data.Karyawan.idBagian).material_select();
                  // Tanggal Lahir
                        var $input = $('.form-ubah-data #munculCuti').pickadate();
                        var picker = $input.pickadate('picker');
                        picker.set('select', data.Karyawan.joinDate, { format: 'yyyy-mm-dd' });

                        $('.modalF').modal('close');
                        $('.ubah_data').modal('open');

                      });
                });
          });

          jQuery(document).ready(function($) {
                $(".clickable-row").click(function() {
                    var nik = $(this).attr('data-table');
                    var tableDataEdit = $('.editDataKaryawan');
                    var actionModal = $('.action-modal a[href=#hapus]').attr('href','/Admin/nik/'+nik);

                    $.get( "/Admin/getData/"+nik, function( data ) {
                      console.log( data );
                      tableDataEdit.html( data );

                     });
                     $('.ubahData').attr('data-init',nik);
                    $('.modalF').modal('open');
                });
            });

          $(document).ready(function() {
            $('select').material_select();

            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15 // Creates a dropdown of 15 years to control year
            });


          });
          $(document).ready(function(){
            $('.modal').modal();

            $('#search #search-input').keyup(function(){
              var dataNik = $(this).val();
                console.log(dataNik);
              $('#niksearch').val(dataNik)
            });

          });

      </script>

      @if(Session::has('message'))
            <script type="text/javascript">
              $(document).ready(function(){
                   // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                       Materialize.toast("{{ Session::get('message') }}", 4000);

              });
            </script>
      @endif



      <script type="text/javascript" src="../assets/js/app.js"></script>



    </body>
  </html>

   <!-- Modal Structure -->
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
              <button class="modal-trigger btn button-color1 radius ubahData" data-init="" >Ubah</button>

            </div>
        </div>
      </div>

  </div>

 <div id="tambah_data" class="modal buat_data ">
    <div class="modal-content right-bar">
        <form method="post" action="{{ url('/Admin/TambahKaryawan') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="head-tambah-data">
                <div class="row">
                <div class="col s4">
                    <div class="file-field input-field">
                       <div class="btn input-file-custem">
                         <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                         <input type="file" name="avatar">
                       </div>
                       <div class="file-path-wrapper">
                         <input class="file-path validate" name="file" type="text">
                       </div>
                     </div>
                </div>
                <div class="col s8">
                    <div class="input-field col s12">
                      <input id="nik" name="nik" type="text" class="validate">
                      <label for="nik">ID Karyawan</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="namaDepan" name="namaDepan" type="text" class="validate">
                      <label for="namaDepan">Nama Depan</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="namaBelakang" name="namaBelakang" type="text" class="validate">
                      <label for="namaBelakang">Nama Belakang</label>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="input-field col s12">
                          <textarea id="alamat" name="alamat" class="materialize-textarea"></textarea>
                          <label for="alamat">Alamat</label>
                        </div>
                    </div>

                    <div class="input-field col s12 m6">
                      <select class="icons select-jk" name="jenisKelamin">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="L" data-icon="../assets/images/male.png" class="circle">Laki-Laki</option>
                        <option value="P" data-icon="../assets/images/female.png" class="circle">Perempuan</option>
                      </select>
                      <label>Jenis Kelamin</label>
                    </div>
                    <div class="input-field col s12 m6">
                      <select class="icons select-jk" name="agama">
                        <option value="" disabled selected>Pilih Agama</option>
                        <option value="Islam"  class="circle">Islam</option>
                        <option value="Kekristenan"  class="circle">Kekristenan</option>
                        <option value="Hindu"  class="circle">Hindu</option>
                        <option value="Buddha"  class="circle">Buddha</option>
                        <option value="Konghucu"  class="circle">Konghucu</option>
                      </select>
                      <label for="first_name">Agama</label>
                    </div>
                    <div class="input-field col s12 m6">
                      <input type="date" name="tglLahir" class="datepicker validate">
                      <label for="ttl">Tanggal lahir</label>
                    </div>
                    <div class="input-field col s12 m6">
                      <input id="first_name" name="noTlp" type="text" class="validate">
                      <label for="first_name">No Tlp</label>
                    </div>
                    <div class="input-field col s12 m6">
                      <input type="date" name="joinDate" class="datepicker validate">
                      <label for="join">Join Date</label>
                    </div>
                    <div class="input-field col s12 m6">
                      <select class="icons select-jk" name="status">
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="Tetap">Karyawan Tetap</option>
                        <option value="Kontrak">Karyawan Kontrak</option>
                      </select>
                      <label>Status</label>
                    </div>
                    <div class="input-field col s12 m6">
                      <select class="icons select-jk" name="jabatan">

                        @foreach ($Jabatan as $jabatan)
                                  <option value="{{ $jabatan->idJabatan }}">{{ $jabatan->nama }}</option>
                        @endforeach

                        <!-- <option value="" disabled selected>Pilih Jabatan</option>
                        <option value="Restourant Manager ( RM )">Restourant Manager ( RM )</option>
                        <option value="Ass Rest Manager ( ARM )">Ass Rest Manager ( ARM )</option>
                        <option value="Shift Leader ( SL )">Shift Leader ( SL )</option>
                        <option value="GOL 03 ( CT )">GOL 03 ( CT )</option>
                        <option value="GOL 02">GOL 02</option>
                        <option value="GOL 01">GOL 01</option> -->
                      </select>
                      <label>Jabatan</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="bagian">
                        @foreach ($Bagianinduk as $bagianI)

                              <option value="" disabled>{{ $bagianI->nama }}</option>
                            @foreach ($bagianI->databagian as $databagian)

                                  <option value="{{ $databagian->idBagian }}">{{ $databagian->nama }}</option>
                            @endforeach
                        @endforeach



                        </select>
                        <label>Bagian</label>
                      </div>

                    <div class="input-field col s12 m6">
                      <input id="munculCuti" type="date" name="munculCuti" class="datepicker validate">
                      <label for="munculCuti">Muncul Cuti</label>
                    </div>

                </div>


            </div>


      </div>
      <div class="footer-simpan">
        <div class="modal-content aksi_footer add-action-footer">
        <div class="footer_aksi">
            <div class="icon_footer">
            <img src="../assets/images/return.png" class="modal-action modal-close" alt="">
            </div>

            <div class="button footer"><input type="submit" name="tambahKaryawan" value="Simpan" class="btn radius button-color1"></div>
        </div>
      </div>
                </div>
              </form>
  </div>

  <div id="ubahData" class="modal ubah_data ">
     <div class="modal-content right-bar">
         <form method="post" class="form-ubah-data" action="{{ url('/Admin/editDataKaryawan/') }}" enctype="multipart/form-data">
           {{ csrf_field() }}
             <div class="head-tambah-data">
                 <div class="row">
                 <div class="col s4">
                     <div class="file-field input-field">
                        <div class="btn input-file-custem input-file-custem2">
                          <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                          <input type="file" name="avatar">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" name="file" type="text">
                        </div>
                      </div>
                 </div>
                 <div class="col s8">
                     <div class="input-field col s12">
                       <input name="nik" id="nik" value="" type="text" class="validate">
                       <label for="nik">ID Karyawan</label>
                     </div>
                     <div class="input-field col s6">
                       <input id="namaDepan" name="namaDepan" value=""  type="text" class="validate">
                       <label for="namaDepan">Nama Depan</label>
                     </div>
                     <div class="input-field col s6">
                       <input id="namaBelakang" name="namaBelakang" value="" type="text" class="validate">
                       <label for="namaBelakang">Nama Belakang</label>
                     </div>
                 </div>
                 </div>
                 <div class="row">
                     <div class="col s12">
                         <div class="input-field col s12">
                           <textarea id="alamat" name="alamat" class="materialize-textarea"></textarea>
                           <label for="alamat">Alamat</label>
                         </div>
                     </div>

                     <div class="input-field col s12 m6">
                       <select class="icons select-jk" name="jenisKelamin" id="jenisKelamin" >
                         <option value="" disabled selected>Pilih Jenis Kelamin</option>
                         <option value="L" data-icon="../assets/images/male.png" class="circle">Laki-Laki</option>
                         <option value="P" data-icon="../assets/images/female.png" class="circle">Perempuan</option>
                       </select>
                       <label>Jenis Kelamin</label>
                     </div>
                     <div class="input-field col s12 m6">
                       <select class="icons select-jk" name="agama" id="agama">
                         <option value="" disabled selected>Pilih Agama</option>
                         <option value="Islam"  class="circle">Islam</option>
                         <option value="Kekristenan"  class="circle">Kekristenan</option>
                         <option value="Hindu"  class="circle">Hindu</option>
                         <option value="Buddha"  class="circle">Buddha</option>
                         <option value="Konghucu"  class="circle">Konghucu</option>
                       </select>
                       <label for="first_name">Agama</label>
                     </div>
                     <div class="input-field col s12 m6">
                       <input type="date" name="tglLahir" id="tglLahir" class="datepicker validate">
                       <label for="ttl">Tanggal lahir</label>
                     </div>
                     <div class="input-field col s12 m6">
                       <input id="noTlp" name="noTlp" type="text" class="validate">
                       <label for="noTlp">No Tlp</label>
                     </div>
                     <div class="input-field col s12 m6">
                       <input type="date" name="joinDate" id="joinDate" class="datepicker validate">
                       <label for="join">Join Date</label>
                     </div>
                     <div class="input-field col s12 m6">
                       <select class="icons select-jk" name="status" id="status">
                         <option value="" disabled selected>Pilih Status</option>
                         <option value="Tetap">Karyawan Tetap</option>
                         <option value="Kontrak">Karyawan Kontrak</option>
                       </select>
                       <label>Status</label>
                     </div>
                     <div class="input-field col s12 m6">
                       <select class="icons select-jk" name="jabatan" id="jabatan">

                         @foreach ($Jabatan as $jabatan)
                                   <option value="{{ $jabatan->idJabatan }}">{{ $jabatan->nama }}</option>
                         @endforeach

                         <!-- <option value="" disabled selected>Pilih Jabatan</option>
                         <option value="Restourant Manager ( RM )">Restourant Manager ( RM )</option>
                         <option value="Ass Rest Manager ( ARM )">Ass Rest Manager ( ARM )</option>
                         <option value="Shift Leader ( SL )">Shift Leader ( SL )</option>
                         <option value="GOL 03 ( CT )">GOL 03 ( CT )</option>
                         <option value="GOL 02">GOL 02</option>
                         <option value="GOL 01">GOL 01</option> -->
                       </select>
                       <label>Jabatan</label>
                     </div>
                     <div class="input-field col s6">
                         <select name="bagian" id="bagian">
                         @foreach ($Bagianinduk as $bagianI)

                               <option value="" disabled>{{ $bagianI->nama }}</option>
                             @foreach ($bagianI->databagian as $databagian)

                                   <option value="{{ $databagian->idBagian }}">{{ $databagian->nama }}</option>
                             @endforeach
                         @endforeach



                         </select>
                         <label>Bagian</label>
                       </div>

                     <div class="input-field col s12 m6">
                       <input  type="date" id="munculCuti" name="munculCuti" class="datepicker validate">
                       <label for="munculCuti">Muncul Cuti</label>
                     </div>

                 </div>


             </div>


       </div>
       <div class="footer-simpan">
         <div class="modal-content aksi_footer add-action-footer">
         <div class="footer_aksi">
             <div class="icon_footer">
             <img src="../assets/images/return.png" class="modal-action modal-close" alt="">
             </div>

             <div class="button footer"><input type="submit" name="tambahKaryawan" value="Simpan" class="btn radius button-color1"></div>
         </div>
       </div>
     </div>
   </form>
</div>


<!-- Modal Ubah Password  -->
<div id="UbahPassword" class="modal modal-fixed-footer ">
<form method="POST" id="mulaiAjukanCuti" action="{{ url('/Admin/password') }}">
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
