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
    <div class="btn-toolbar text-center">

    </div>

    <div class="container thumbs">
    <h2><center><strong>Data Booking</strong></center></h2>
    </br></br>
    @if(isset($msg))
        <div class="alert alert-danger alert-block">
         <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $msg }}</strong>
        </div>
    @endif

    @if(isset($booking))
    <table border='1' align='center' cellpadding='5' cellspacing='10'>
      <th>Nama Paket</th>
      <th>Waktu Booking</th>
      <th>Batas Bayar</th>
      <th>Tanggal Berangkat</th>
      <th>Tanggal Balik</th>
      <th>Destinasi</th>
      <th>Harga</th>
      <th>Lokasi Jemput</th>
      <th>Foto Tour Guide</th>
      <th>Nama Tour Guide</th>
      <th>Status Bayar</th>
      @foreach($booking as $ang)
      <tr>
      <td align='center'>{{$ang->paket_tours->namapaket}}</td>
      <td align='center'>{{$ang->created_at}}</td>
      <td align='center'>{{$ang->batasbayar}}</td>
      <td align='center'>{{$ang->tanggaltourberangkat}}</td>
      <td align='center'>{{$ang->tanggaltourbalik}}</td>
      <td align='center'>{{$ang->paket_tours->daftardestinasi}}</td>
      <td align='center'>{{$ang->totalbayar}}</td>
      <td align='center'>{{$ang->lokasi_jemput}}</td>
      <td style="width:20%;"><a href="{{asset('/foto_kartu_anggota/'.$ang->supir->kartu_anggota) }}"><img id="myImg" src="{{asset('/foto_kartu_anggota/'.$ang->supir->kartu_anggota) }}" style='width:220px; height:200px;'></a></td>
      <td style="text-align: center;">{{ $ang->supir->nama_supir }}</td>
      <td align='center'>{{$ang->status_bayar}}</td>
      </tr>
      @endforeach
    </table>
  <hr>

    <center><h5 style="color:red">*Pesanan Akan Hilang Otomatis Jika Belum Membayar Sesuai Batas Waktu</h5></center>
    <center><h5 style="color:red">*Klik Tombol 'Hubungi Admin' Untuk Verifikasi Jika Sudah Membayar</h5></center>
    <hr>
    <center><a href="http://wa.me/6282291887778" class="btn btn-success" target="_blank">Hubungi Admin</a></center>
    @else
    <center><h4>Belum Terdapat Data Booking, Silahkan Booking Terlebih Dahulu</h4></center>
    @endif


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
