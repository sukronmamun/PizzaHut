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
       <!-- <link rel="stylesheet" href="../assets/css/chartist.css"> -->

       <!--LIB font -->
       <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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

    <body>
     <div class="row">
       <ul id="dropdown1" class="dropdown-content">
         <li><a href="#UbahPassword" class="ubahPassword">Ubah Password</a></li>
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
             <div class="col s3 sidebar">
                 <div class="sidebarmain">
                     <img class="responsive-img" src="../assets/images/{{ Auth::guard('manager')->user()->avatar }}">
                 <div class="name">{{ ucfirst(Auth::guard('manager')->user()->namadepan) }} {{ ucfirst(Auth::guard('manager')->user()->namaBelakang) }}</div>
                 <div class="status_level">
                     Manager
                 </div>
                 </div>

             </div>
             <div class="col s9 main-content">
                 <div class="contain">
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
                     <div class="col s7 graf-info-cuti">

                        <div class="ct-chart ct-golden-section"></div>

                     </div>
                     <div class="col s5">
                        <div class="info-cuti">
                            <div class="col s12 list-info">
                                <div class="total">{{ $TotalKaryawan }}</div>
                                <div class="atribut">total karyawan</div>
                            </div>
                             <div class="col s12 list-info">
                                <div class="total">{{ $TotalCutiApproval }}</div>
                                <div class="atribut">approval Cuti</div>
                            </div>
                            <div class="col s12 list-info">
                                <div class="total">{{ $TotalCutiPanding }}</div>
                                <div class="atribut">pandding Cuti</div>
                            </div>

                        </div>
                     </div>
                 </div>
             </div>
        </div>
    </section>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../assets/js/materialize.min.js"></script>


      <script type="text/javascript" src="../dist/chartist.min.js"></script>
      <script type="text/javascript" src="../assets/js/custem.js"></script>

      <!-- <script type="text/javascript" src="../assets/js/app.js"></script> -->

      <script type="text/javascript">
      Chartist.Line('.ct-chart', {
        labels: <?php echo $tanggal ?> ,
        series: [{{ $banyak }}]
      },{
        showPoint: true
      }, [['screen and (min-width: 640px)']],
      { showPoint: true,
        pointColor:'#ffffff',
        low: 0,
        showArea: true,
        fullWidth: true,
        chartPadding: {
          right: 40,
        }
      });
      $(document).ready(function(){
        $('.modal').modal();

      });
      </script>

    </body>
  </html>

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
