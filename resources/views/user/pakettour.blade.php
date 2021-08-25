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
    <div class="jumbotron">
    <!-- End Slide gallery -->
    </div>

    <!-- Thumbnails -->
    <div class="search">
    <form action="/pakettour/cari" method="get" enctype="multipart/form-data">
      <input type="text" placeholder="Cari Paket Tour.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    </div>

    <div class="btn-toolbar text-center">

    </div>

    <div class="container thumbs">

    </br></br>
            <table border='1' align='center' cellpadding='5' cellspacing='10'>

              <th>Nama Paket</th>
              <th>Destinasi</th>
              <th>Gambar Mobil</th>
              <th>Kapasitas</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Booking</th>

              @foreach($pakettour as $ang)
              <tr>
              <td align='center'>{{$ang->namapaket}}</td>
              <td align='center'>{{$ang->daftardestinasi}}</td>
              <td align='center'><a href="{{asset('/foto_mobil_wisata/'.$ang->mobil_travels->gambarmobil) }}"><img src="{{asset('/foto_mobil_wisata/'.$ang->mobil_travels->gambarmobil) }}" width='150' height='150'></td>
              <td align='center'>{{$ang->mobil_travels->kapasitas}}</td>
              <td align='center'>{{$ang->hargapaket}}</td>
              <td align='center'>{{$ang->deskripsi}}</td>
              <td align='center'><a href='/user/booking/{{ $ang->id }}'>Booking</td>
              </tr>
            @endforeach
    </table>

</div>
    <!-- Footer -->
    @extends('layouts.footer')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('assets/home/js/jquery.js')}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('assets/home/js/bootstrap.min.js')}"></script>
    <script src="{{asset('assets/home/js/bootshape.js')}"></script>

  </body>
</html>
