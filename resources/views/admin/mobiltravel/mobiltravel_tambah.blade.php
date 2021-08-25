<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="{{asset('assets/images/logo.png')}}">
</head>
<body>
  <div class="container">
    <div class="card mt-5">
      <div class="card-header text-center">
        Data Mobil Travel - <strong>TAMBAH DATA</strong>
      </div>
      <div class="card-body">
        <a href="/admin/mobiltravel" class="btn btn-primary">Kembali</a>
        <br/>
        <br/>

        <form method="post" action="/admin/mobiltravel/store" enctype="multipart/form-data">

          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Mobil</label>
            <input type="text" name="namamobil" class="form-control" placeholder="Nama Mobil ..">

            @if($errors->has('namamobil'))
            <div class="text-danger">
              {{ $errors->first('namamobil')}}
            </div>
            @endif

          </div>

          <div class="form-group">
            <label>Kapasitas Mobil</label>
            <input type="text" name="kapasitas" class="form-control" placeholder="Kapasitas mobil ..">

            @if($errors->has('kapasitas'))
            <div class="text-danger">
              {{ $errors->first('kapasitas')}}
            </div>
            @endif

          </div>

          <label>Input Gambar Mobil</label>
          <div class="input-group control-group">
            <div class="custom-file">
              <input type="file" class="form-control" name="gambarmobil" accept=".jpg,.png,.jpeg" id="file">
              @if($errors->has('gambarmobil'))
              <div class="text-danger">
                {{ $errors->first('gambarmobil')}}
              </div>
              @endif
            </div>
          </div>
        </br>

      </br>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Simpan">
      </div>

    </form>

  </div>
</div>
</div>
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
    var msg  = "Tambah Mobil || Web Wisata Karo";
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
