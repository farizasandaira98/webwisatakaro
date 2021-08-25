<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/images/logo.png')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Input Data Booking - <strong>TAMBAH DATA</strong>
            </div>
            <div class="card-body">
                <a href="/user/pakettour" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>

                <form method="post" action="/user/booking/store" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" readonly class="form-control" placeholder="Nama Paket Tour ..">

                        @if($errors->has('nama'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" name="nama_paket" value="{{$pakettour->namapaket}}" readonly class="form-control" placeholder="Daftar Destinasi ..">

                        @if($errors->has('nama_paket'))
                        <div class="text-danger">
                            {{ $errors->first('nama_paket')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Nomor Telpon Yang Dapat Dihubungi</label>
                        <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telpon ..">

                        @if($errors->has('no_telp'))
                        <div class="text-danger">
                            {{ $errors->first('no_telp')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="Tanggal">Tanggal Tour Berangkat</label>
                        <div class='input-group date' id='tanggaltourberangkat'>
                        <input type='text' class="form-control" name="tanggaltourberangkat" autocomplete="off"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

                        @if($errors->has('tanggaltourberangkat'))
                        <div class="text-danger">
                        {{ $errors->first('tanggaltourberangkat')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Untuk Berapa Hari</label>
                        <h5 style="color:red;">*Maksimal 7 Hari</h5>
                        <input type="number" name="tanggaltourbalik" min="1" max="7" class="form-control" autocomplete="off">
                        @if($errors->has('tanggaltourbalik'))
                        <div class="text-danger">
                        {{ $errors->first('tanggaltourbalik')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Lokasi Jemput</label>
                        <input type="text" name="lokasi_jemput" class="form-control" placeholder="Lokasi Jemput ..">

                        @if($errors->has('lokasi_jemput'))
                        <div class="text-danger">
                            {{ $errors->first('lokasi_jemput')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="idtour" value="{{$pakettour->id}}" class="form-control">
                        @if($errors->has('idtour'))
                        <div class="text-danger">
                        {{ $errors->first('idtour')}}
                        </div>
                        @endif
                    </div>

            </br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>

        </form>

    </div>
</div>
</div>
<script type="text/javascript">
    $(function () {
        $('#tanggaltourberangkat').datetimepicker({
            minDate:new Date(),format: 'YYYY-MM-DD'
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $('#tanggaltourbalik').datetimepicker({
            minDate:new Date(),format: 'YYYY-MM-DD'
        });
    });
</script>

<script type="text/javascript">
var uploadField = document.getElementById("file");

uploadField.onchange = function() {
    if(this.files[0].size > 2000000){
       alert("File Max Is 2MB");
       this.value = "";
    };
};
</script>
<script type="text/javascript">
var rev = "fwd";
function titlebar(val){
var msg  = "Tambah Paket Tour || Web Wisata Gorontalo";
var res = " ";
var speed = 100;
var pos = val;
var le = msg.length;
if(rev == "fwd"){
  if(pos < le){
      pos = pos+1;
      scroll = msg.substr(0,pos);
      document.title = scroll;
      timer = window.setTimeout("titlebar("+pos+")",speed);
  } else {
      rev = "bwd";
      timer = window.setTimeout("titlebar("+pos+")",speed);
  }
} else {
  if(pos > 0) {
      pos = pos-1;
      var ale = le-pos;
      scrol = msg.substr(ale,le);
      document.title = scrol;
      timer = window.setTimeout("titlebar("+pos+")",speed);
  } else {
      rev = "fwd";
      timer = window.setTimeout("titlebar("+pos+")",speed);
  }
}
}
titlebar(0);
</script>
</body>

</html>
