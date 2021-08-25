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
    @if(isset($nota))
    <h2><center><strong>Terima Kasih Telah Memesan</strong></center></h2></br>
    <h5>Atas Nama : {{$nota->name}}</h5></br>
    <h5>Nama Paket : {{$nota->paket_tours->namapaket}}</h5></br>
    <h5>Nomor Telpon : {{$nota->no_telp}}</h5></br>
    <h5>Waktu Booking : {{$nota->created_at}}</h4></br>
    <h5>Tanggal Berangkat : {{$nota->tanggaltourberangkat}}<h5></br>
    <h5>Tanggal Kembali : {{$nota->tanggaltourbalik}}<h5></br>
    <h5>Total Tagihan :{{$nota->totalbayar}}<h5></br>
    <h5>Lokasi Jemput :{{$nota->lokasi_jemput}}<h5>
    <hr>
    <h5>Informasi Tour Guide Yang Akan Mengantar<h5>
    </br>
    <table border='1' align='center' cellpadding='5' cellspacing='10'>
      <thead >
        <tr style="text-align: center;">
          <th style="text-align: center;">Foto Kartu Anggota</th>
          <th style="text-align: center;">Nama Supir/ Tour Guide</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td style="width:20%;"><a href="{{asset('/foto_kartu_anggota/'.$nota->supir->kartu_anggota) }}"><img id="myImg" src="{{asset('/foto_kartu_anggota/'.$nota->supir->kartu_anggota) }}" style='width:220px; height:200px;'></a></td>
        <td style="text-align: center;">{{ $nota->supir->nama_supir }}</td>
        </tr>
      </tbody>
    </table>
    <hr>
    <h5>Waktu Berangkat Tour Akan Dilaksanakan Jam 08.00 Dan Tour Akan Selesai Jam 18.00<h5></br>
    <h5>Segera Membayar Tagihan Sebelum Tanggal Dan Jam : {{$nota->batasbayar}} ,Pesanan Akan Otomatis Terhapus Jika Pesanan Telah Lewat Dari Waktu Yang Ditentukan<h5></br>
    <h5>Tekan 'Hubungi Admin' Untuk Verifikasi Pembayaran Jika Telah Membayar<h5>
    <hr></br>
    <center><a href="http://wa.me/6282291887778" class="btn btn-success" target="_blank">Hubungi Admin</a></center>
    </br>
    <center><a href="/user" class="btn btn-primary">Kembali Ke Home</a></center>
    @else
    <meta http-equiv="refresh" content="3;url=/user" />
    <h2><center><strong>Anda Belum Bisa Mengakses Halaman Ini</strong></center></h2></br>
    <h5>Silahkan Memesan Terlebih Dahulu Untuk Mendapatkan Nota</h5></br>
    @endif
  </br>


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
