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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
   @extends('layouts.navbar')
    <!-- Slide gallery -->
  </br>
  </br>
  </br>
  </br>
  </br>
      <div class="search">
      <form action="/destinasi/cari" method="get" enctype="multipart/form-data">
        <input type="text" placeholder="Cari Destinasi Wisata.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
      </div>

    <div class="jumbotron">
      <div class="container">
        <!-- Thumbnails -->
        <div class="col-xs-12">

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-sl ide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
          @foreach($destinasi as $ang)
          <div class="item active">
          <img src="{{asset('/foto_destinasi_wisata/'.$ang->gambardestinasi) }}" alt="">
          <div class="carousel-caption">
          </div>
          </div>
          @endforeach
          </div>
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
        </div>
      </div><!-- End Slide gallery -->
    </div>

    <!-- Thumbnails -->
    <div class="container thumbs">
    @foreach($destinasi1 as $ang)
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src="{{asset('/foto_destinasi_wisata/'.$ang->gambardestinasi) }}" alt="" class="img-responsive">
        <div class="caption">
          <h3 class="">{{$ang->namadestinasi}}</h3>
          <p>
          {{substr($ang->deskripsi,0,150)}}...
          </p>
          <div class="btn-toolbar text-center">
            <a href="/destinasi/{{ $ang->id }}" role="button" class="btn btn-primary pull-right">Details</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
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
