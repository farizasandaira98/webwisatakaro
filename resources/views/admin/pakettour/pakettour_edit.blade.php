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
                Data Paket Tour - <strong>EDIT DATA</strong>
            </div>
            <div class="card-body">
                <a href="/admin/pakettour" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>

                <form method="post" action="/admin/pakettour/update/{{$pakettour->id}}" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Paket Tour</label>
                        <input type="text" name="namapaket" class="form-control" placeholder="Nama Paket Tour .."
                        value="{{$pakettour->namapaket}}">

                        @if($errors->has('namapaket'))
                        <div class="text-danger">
                            {{ $errors->first('namapaket')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Daftar Destinasi</label>
                        <input type="text" name="daftardestinasi" class="form-control" placeholder="Daftar Destinasi .."
                        value="{{$pakettour->daftardestinasi}}">

                        @if($errors->has('daftardestinasi'))
                        <div class="text-danger">
                            {{ $errors->first('daftardestinasi')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Harga Paket</label>
                        <input type="text" name="hargapaket" class="form-control" placeholder="Harga Paket ..">

                        @if($errors->has('hargapaket'))
                        <div class="text-danger">
                        {{ $errors->first('hargapaket')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi ..">{{$pakettour->deskripsi}}</textarea>

                        @if($errors->has('deskripsi'))
                        <div class="text-danger">
                        {{ $errors->first('deskripsi')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Mobil Yang Digunakan</label>
                        <select class="form-control" id="pakettour"
                        name="id_travel">
                        @foreach($mobiltravel as $stat)
                        <option value="{{$stat->id}}">{{$stat->namamobil}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_travel'))
                    <div class="text-danger">
                        {{ $errors->first('id_travel')}}
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
var msg  = "Edit Paket Tour || Web Wisata karo";
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
