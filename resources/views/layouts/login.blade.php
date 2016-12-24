<html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="assets/css/app.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="assets/css/font-awesome.css"  media="screen,projection"/>
       <title>PizzaHut</title>
       <!--LIB Chart -->
       <link rel="stylesheet" href="dist/chartist.min.css">
       <!-- <link rel="stylesheet" href="assets/css/chartist.css"> -->

       <!--LIB font -->
       <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="login">
     <div class="row">
            <div class="login-main">
                <div class="logo">
                    <img src="assets/images/Pizza_hut_logo.gif" alt="">
                </div>
                <div class="form">

                  @yield('content')
                   
                </div>
            </div>
     </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="assets/js/materialize.min.js"></script>


      <script type="text/javascript" src="dist/chartist.min.js"></script>

      <script type="text/javascript" src="assets/js/app.js"></script>



    </body>
  </html>
