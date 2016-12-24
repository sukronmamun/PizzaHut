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
    </head>

    <body class="login">
     <div class="row">
            <div class="login-main">
                <div class="logo">
                    <img src="../assets/images/Pizza_hut_logo.gif" alt="">
                </div>
                <div class="form">

                  <form class="col s12" role="form" method="POST" action="{{ url('/login') }}">
                      {{ csrf_field() }}
                   <div class="input-field col s10 offset-s1">
                     <input id="email" type="text" class="validate"  name="email" value="{{ old('username') }}" required autofocus>
                     <label for="email">Username</label>
                   </div>
                   <div class="input-field col s10 offset-s1">
                     <input name="password" type="password" id="password" type="password" class="validate">
                     <label for="password">Password</label>
                   </div>
                   <div class="input-field col s10 offset-s1">
                     <input type="submit" class="btn btn-primary col s10 offset-s1 radius" value="Masuk">
                   </div>
                   </form>


                </div>
            </div>
     </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../assets/js/materialize.min.js"></script>


      <script type="text/javascript" src="../dist/chartist.min.js"></script>

      <script type="text/javascript" src="../assets/js/app.js"></script>



    </body>
  </html>
