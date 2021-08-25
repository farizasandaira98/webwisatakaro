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
                Data Destinasi Wisata - <strong>TAMBAH DATA</strong>
            </div>
            <div class="card-body">
                <a href="/admin/destinasiwisata" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>

                <form method="post" action="/admin/destinasiwisata/store" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Destinasi Wisata</label>
                        <input type="text" name="namadestinasi" class="form-control" placeholder="Nama Destinasi Wisata ..">

                        @if($errors->has('namadestinasi'))
                        <div class="text-danger">
                            {{ $errors->first('namadestinasi')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Lokasi Destinasi Wisata</label>
                        <input type="text" name="lokasidestinasi" class="form-control" placeholder="Lokasi Destinasi Wisata ..">

                        @if($errors->has('lokasidestinasi'))
                        <div class="text-danger">
                            {{ $errors->first('lokasidestinasi')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi .."></textarea>

                        @if($errors->has('deskripsi'))
                        <div class="text-danger">
                        {{ $errors->first('deskripsi')}}
                        </div>
                        @endif

                    </div>

                  <label>Input gambardestinasi Destinasi Wisata</label>
                  <div class="input-group control-group">
                      <div class="custom-file">
                          <input type="file" class="form-control" name="gambardestinasi" accept=".jpg,.png,.jpeg" id="file">
                          @if($errors->has('gambardestinasi'))
                          <div class="text-danger">
                          {{ $errors->first('gambardestinasi')}}
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
var msg  = "Tambah Destinasi Wisata || Web Wisata Karo";
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
