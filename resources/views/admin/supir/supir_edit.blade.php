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
                Data Supir - <strong>EDIT DATA</strong>
            </div>
            <div class="card-body">
                <a href="/admin/supir" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>

                <form method="post" action="/admin/supir/update/{{$supir->id}}" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="id" class="form-control" value="{{$supir->id}}" hidden>
                        @if($errors->has('id'))
                        <div class="text-danger">
                            {{ $errors->first('id')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama Supir / Tour Guide</label>
                        <input type="text" name="nama_supir" class="form-control" placeholder="Nama Supir .."
                        value="{{$supir->nama_supir}}">

                        @if($errors->has('nama_supir'))
                        <div class="text-danger">
                            {{ $errors->first('nama_supir')}}
                        </div>
                        @endif

                    </div>

                    <label>Input Foto Anggota</label>
                    <div class="input-group control-group">
                        <div class="custom-file">
                            <input type="file" class="form-control" name="kartu_anggota" accept=".jpg,.png,.jpeg" id="file">
                            @if($errors->has('kartu_anggota'))
                            <div class="text-danger">
                            {{ $errors->first('kartu_anggota')}}
                            </div>
                            @endif
                        </div>
                        </div>
                        </br>

                    <div class="form-group">
                        <label>Status</label>
                        @if($supir->status == "Tidak Tersedia")
                        <select name="status" class="form-control">
                          <option value="Tidak Tersedia" selected>Tidak Tersedia</option>
                          <option value="Tersedia">Tersedia</option>
                        </select>
                        @elseif($supir->status == "Tersedia")
                        <select name="status" class="form-control">
                          <option value="Tidak Tersedia">Tidak Tersedia</option>
                          <option value="Tersedia" selected>Tersedia</option>
                        </select>
                        @endif

                        @if($errors->has('status'))
                        <div class="text-danger">
                            {{ $errors->first('status')}}
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
var msg  = "Edit Data Supir || Web Wisata Karo";
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
