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

       <!--LIB font -->
       <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
       <link rel="stylesheet" href="../assets/css/normalize.css">
        <link rel="stylesheet" href="../assets/css/jquery.steps.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">



	<link rel="stylesheet" type="text/css" href="../assets/css/semantic.ui.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/prism.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/calendar-style.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/pignose.calendar.css" />

      <script type="text/javascript" src="../assets/js/custem.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
          .margin{
              margin-top: 40px;
          }
          .margin-side{
              margin:6px 5px !important;
          }
          #ajukanCuti{
              width: 40% ;
              height: 100vh !important;
              max-height: 100vh !important;
              top:0 !important;
              background: rgba(192,41,65,1);


          }
          .wizard > .content{
              background: rgba(192,41,65,1);
              min-height: 90%;
              margin: 0 !important;
              -webkit-border-radius: 0;
              -moz-border-radius: 0;
              border-radius: 0;
          }

          .wizard > .actions{
          margin-top: 1em !important;
          }
          .box{
            margin-top: 6px;
            padding: 0.6em;
          }
          .wizard > .actions ul{
              display: flex;
              flex-wrap: nowrap;
              justify-content: center;
              margin-top: -30px;
          }
          .Button-action a:hover{
              background-color: #da644b;
              color: #fff;
          }
          .Button-action a{
              background-color: #f26c4f
          }
          .wizard > .actions ul li a,
          .wizard > .actions ul li a:hover{
            width: 175px;
            padding: 0 0;
            background-color: #f26c4f;
            height: 35px;
            border-radius: 50px;
            text-align: center;
            line-height: 35px;
          }
          .wizard > .actions ul li:first-child{
              display: none;
          }
          .wizard > .content > .body{
              padding: 0;
              width: 100%;
          }
          .wizard > .steps {
                display: none;
            }
          #multiple.article{
            border-top: 0;
          }
          #ajukanCuti .modal-content{
              padding: 0;
              margin: 0;
          }

          #multiple h2{
            color: #fff;
            margin-top: -32px;
          }
          #kirim{
            opacity: 0;
          }
          .{
            margin-top: 5px;
            padding: 13px;
          }
          .content-cuti{
              margin-top: 45px;

          }
          .content-cuti h2{
              text-align: center;
              color: #fff;

          }
          .content-cuti .row label{
            color: #fff;

          }
          .content-cuti .row{
              margin-top: 100px;
              color: #fff;
          }
          .wizard > .content > .body input {
              border:0;
          }
          .content-cuti input[type='text']{
              border: 0;
              border-bottom:  1px solid #9e9e9e !important;
           }

          .content-cuti textarea.materialize-textarea {
                padding: .8rem 0 13rem 0;
              border: 1px solid #9e9e9e;
            }

          .input-calendar {
			display: block;
			width: 100%;
			max-width: 360px;
			margin: 0 auto;
			height: 3.2em;
			line-height: 3.2em;
			font: inherit;
			padding: 0 1.2em;
			border: 1px solid #d8d8d8;
			-shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-o--shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-moz--shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-webkit--shadow: 0 4px 12px rgba(0, 0, 0, .25);
		}

		.btn-calendar {
			display: block;
			width: 100%;
			max-width: 360px;
			height: 3.2em;
			line-height: 3.2em;
			background-color: #52555a;
			margin: 0 auto;
			font-weight: 600;
			color: #ffffff !important;
			text-decoration: none !important;
			-shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-o--shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-moz--shadow: 0 4px 12px rgba(0, 0, 0, .25);
			-webkit--shadow: 0 4px 12px rgba(0, 0, 0, .25);
		}
    #jam-digital .jam{
        margin-top: 10px;
    }
		.btn-calendar:hover {
			background-color: #5a6268;
		}
    .atribut{
      margin-top: 5px;
    }
    #user #jam-digital .jam span{
        margin-top: 5px;
    }
    .Button-action{
      display: flex;
      flex-direction: column;

    }
    .dropdown-content{
      min-width: 180px;
      margin-top: 25px;
    margin-left: 5px;
    }
    .Button-action a{
      margin-top: 10px;
    }
      </style>
    </head>

    <body id="user">
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="#UbahPassword">Ubah Password</a></li>
        <li class="divider"></li>
        <li>
          <a href="{{ url('/karyawan/logout') }}" onclick="event.preventDefault();
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
                            <p id="jam"></p><span>:</span>
                            <p id="menit"></p><span>:</span>
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
             <div class="col s12 m3 sidebar">
                 <div class="sidebarmain">
                     <img class="responsive-img" src="../assets/images/{{ Auth::guard('karyawan')->user()->avatar }}">
                     <div class="name">{{ ucfirst(Auth::guard('karyawan')->user()->namadepan) }} {{ ucfirst(Auth::guard('karyawan')->user()->namaBelakang) }}</div>
                 <div class="status_level">
                     Karyawan
                 </div>
                 @if(strtotime(Auth::guard('karyawan')->user()->munculCuti) <= strtotime(date("Y-m-d")))
                 <div class="Button-action margin">
                    <a href="#ajukanCuti" class="waves-effect waves-light modal-trigger btn radius ">Ajukan Cuti</a>
                 </div>
                 @endif
                 </div>

             </div>
             <div class="col s12 m9 main-content">
                 <div class="contain">
                    <div class="icon">
                         <a href="{{ url('/karyawan/home') }}"><i class="fa fa-home" aria-hiddem="true"></i></a>
                     </div>
                     <div class="icon">
                          <a href="{{ url('/karyawan/cuti') }}"><i class="fa fa-bar-chart-o" aria-hiddem="true"></i></a>
                      </div>
                 </div>
                 <div class="col s12">
                     <div class="col s12 m7 graf-info-cuti">

                        <div class="ct-chart ct-golden-section"></div>

                     </div>
                     <div class="col s12 m5">
                        <div class="info-cuti">
                            <div class="col s12 list-info">
                                <div class="total">{{ ucfirst(Auth::guard('karyawan')->user()->status) }}</div>
                                <div class="atribut">Status</div>
                            </div>
                             <div class="col s12 list-info">
                                <div class="total">12</div>
                                <div class="atribut">Sisa Cuti</div>
                            </div>
                            <div class="col s12 list-info">
                                <div class="total">99</div>
                                <div class="atribut">Jumlah Cuti</div>
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

      <!-- <script type="text/javascript" src="../assets/js/app.js"></script> -->
      <script type="text/javascript" src="../assets/js/modernizr-2.6.2.min.js"></script>
      <script type="text/javascript" src="../assets/js/jquery.cookie-1.3.1.js"></script>
      <script type="text/javascript" src="../assets/js/jquery.steps.js"></script>

	    <script type="text/javascript" src="../assets/js/moment.min.js"></script>
	    <script type="text/javascript" src="../assets/js/pignose.calendar.js"></script>
      <script>
           $(document).ready(function(){
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

                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('#ajukanCuti').modal();
               $('#UbahPassword').modal();
                    $("#wizard").steps({
                        headerTag: "h2",
                        bodyTag: "section",
                        transitionEffect: "slideLeft",
                        stepsOrientation: "horizontal"
                    });

           });

           $(function() {
		$('#wrapper .version strong').text('v' + pignoseCalendar.VERSION);
		function onClickHandler(date, obj) {
			/**
			 * @date is an array which be included dates(clicked date at first index)
			 * @obj is an object which stored calendar interal data.
			 * @obj.calendar is an element reference.
			 * @obj.storage.activeDates is all toggled data, If you use toggle type calendar.
			 */

			var $calendar = obj.calendar;
			var $box = $calendar.parent().siblings('.box').show();
			var text = '';

			if(date[0] !== null) {
				text += date[0].format('YYYY-MM-DD');
			}

			if(date[0] !== null && date[1] !== null) {
				text += ' ~ ';
			} else if(date[0] === null && date[1] == null) {
				text += 'nothing';
			}

			if(date[1] !== null) {
				text += date[1].format('YYYY-MM-DD');
			}

			$box.text(text);
            $('.values').val(text);
		}





		// Multiple picker type Calendar
		$('.multi-select-calendar').pignoseCalendar({
			multiple: true,
			select: onClickHandler
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

    </body>
  </html>

<div id="ajukanCuti" class="modal ">
    <div class="modal-content">
        <div class="content">
        <form method="POST" id="mulaiAjukanCuti" action="{{ url('/karyawan/ajukanCuti') }}">
          {{ csrf_field() }}
            <div id="wizard">
                <h2>First Step</h2>
                <section>
                  <div id="multiple" class="article">
                    <h2>PILIH TANGGAL CUTI</h2>
                    <div class="multi-select-calendar"></div>
                    <input type="hidden" name="tanggal" class="values" value="">
                    <div class="box"></div>
                  </div>
                </section>

                <h2>Second Step</h2>
                <section>
                  <div class="content-cuti">
                      <h2>FORM PENGAJUAN CUTI</h2>
                       <div class="row">
                        <div class="input-field col s10 offset-s1">
                          <input value="" id="jenisCuti" name="jenisCuti" type="text" value="" class="validate">
                          <label class="active" for="first_name2">Jenis Cuti</label>
                        </div>
                        <div class="input-field col s10 offset-s1">
                          <textarea id="textarea1" name="keterangan" value="" class="keterangan materialize-textarea"></textarea>
                          <label for="textarea1">Textarea</label>
                        </div>
                      </div>
                  </div>
                </section>


            </div>
            <input type="submit" id="kirim" value="Kirim" >
            </form>
        </div>
    </div>
  </div>

  <div id="UbahPassword" class="modal modal-fixed-footer ">
  <form method="POST" id="mulaiAjukanCuti" action="{{ url('/karyawan/password') }}">
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
