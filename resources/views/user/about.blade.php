<!DOCTYPE html>
<html>
  <head>
    <title>Web Wisata Karo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{asset('assets/home/css/bootstrap.css')}}" rel="stylesheet">

    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Belgrano|Courgette&subset=latin,latin-ext' rel='stylesheet' type='text/css'>


    <!--Bootshape-->
    <link href="{{asset('assets/home/css/bootshape.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

   @extends('layouts.navbar')

    <!-- Thumbnails -->
    <div class="container thumbs">
        <br><br><br><br> <br><br>

          <div class='caption'>
            <center><h3>Nama Aplikasi : Website Wisata Karo</h3></center>
            <center><h4>Nama Pembuat : Benhur Brahmana</h4></center>
            <center><p>NIM : 175410108</p></center>
          </div>
    </div>
    </div><!-- End Thumbnails -->
    <!-- Footer -->
    @extends('layouts.footer')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('assets/home/js/jquery.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('assets/home/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/home/js/bootshape.js')}}"></script>
  </body>
</html>
