<html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../assets/css/app.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../assets/css/font-awesome.css"  media="screen,projection"/>
       <title>PizzaHut</title>
       <!--LIB Chart -->
       <link rel="stylesheet" href="../dist/chartist.min.css">
       <!-- <link rel="stylesheet" href="../assets/css/chartist.css"> -->

       <!--LIB font -->
       <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style media="screen">
        .Container-info{
            width: 70%;
            position: relative;
            z-index: 999;
            padding: 10px 100px;
            text-align: justify;
            background-color: rgba(255, 255, 255, 0.3);
            color: #fff;
            height: 100vh;
        }
        body{
          overflow:auto;

        }
        .login-main{
          width: 30%;

        }
        .main{
          display: flex;
          flex-wrap: nowrap;

        }
        table{
          width: 300px;
        }
        .lgn{
          margin: 5px;
          padding: 0 10px;
        }
        .form h3{
            margin-top: -20px;
            padding-bottom: 50px;
            color: #fff;
            text-shadow: 3px 3px 3px rgba(0,0,0,0.5);
        }
        .circle{
          float: left;
          width: 150px;
          height: 30px;
          border-radius: 3px;
          background-color: #fff;
        }
        .circle::after{
          clear: both;
        }
        #content-circle{
          margin-top:50px;
          display: flex;
          flex-wrap: wrap;
          /*flex-direction: column;*/
          /*justify-content: left;*/

        }
        #content-circle .content{
          width: 260px;
          height: 100px;
        }
        .Container-info h5{
          position: relative;
          margin-top: 200px;
        }
        .btn-primary{
          background-color: #ff2d55 !important;
        }
        #CaraPemakaian p{
          text-align: justify;
        }
        hr{
          width: 50px;
          background-color: #000;
          height: 5px;
          margin-top: -10px;

          border: 0;
          position: relative;
          /*left: 0;*/
          /*float: left;*/
          display: block;

        }
        .desk{
          margin-top: 30px
        }
        hr:after,hr:before{
          /*clear: both;*/
        }
      </style>
    </head>

    <body class="login">
     <div class="row">
            <div class="main">
              <div class="Container-info">
                <h5>Alamat </h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <div id="content-circle">
                  <div class="content">
                    <a href="#CaraPemakaian" class="btn btn-primary">Cara Pemakaian</a>
                    <!-- <div class="circle">

                    </div>
                    <p>lorem Ipsum</p>
                    <p>lorem impum</p> -->
                  </div>
                  <!-- <div class="content">
                    <div class="circle">

                    </div>
                    <p>lorem Ipsum</p>
                    <p>lorem impum</p>
                  </div>
                  <div class="content">
                    <div class="circle">

                    </div>
                    <p>lorem Ipsum</p>
                    <p>lorem impum</p>
                  </div> -->
                </div>

              </div>
              <div class="login-main">
                  <div class="logo">
                      <img src="../assets/images/Pizza_hut_logo.gif" alt="">
                  </div>
                  <div class="form">
                    <h3>Login</h3>
                     <div class="input-field col s12">
                       <a href="{{ url('karyawan/login') }}" class="btn lgn btn-primary"> Login Karyawan</a>
                       <a href="{{ url('manager/login') }}" class="btn lgn btn-primary"> Login Manager</a>
                     </div>
                  </div>

              </div>
            </div>
     </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../assets/js/materialize.min.js"></script>


      <script type="text/javascript" src="../dist/chartist.min.js"></script>

      <script type="text/javascript" src="../assets/js/app.js"></script>

      <script type="text/javascript">
        $(document).ready(function() {
          $('.modal').modal();
        });
      </script>

    </body>
  </html>

<div id="CaraPemakaian"class="modal modal-fixed-footer ">
    <div class="modal-content">
          <h4>Cara Pemakaian</h4>
          <hr align="left">
          <div class="desk">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>

    </div>
    <div class="modal-footer">
      <button class="modal-action modal-close btn btn-primary margin-side">Kembali</button>
    </div>
  </div>
