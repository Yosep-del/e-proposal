@extends('v_lte')
@section('form')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css"> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

<head>
<style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>
</head>

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Regis User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="/regisuser" >
            @csrf
            <div class="form-group">
            <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="namanew" class="form-control" id="nama" placeholder="(username jemaat login)">
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="usernew" class="form-control" id="username" placeholder="(username jemaat login)">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="passnew" class="form-control" id="password" placeholder="(password jemaat login)">
                        
                  <br>

@if($tambahrole == "katimpel")
<div class="form-group">
                  <label for="Bidang">BIDANG :</label>
                  <select class="form-control" id="listbidang" style="width:80%; float:right" name="bidangs" onchange="filter()">
                  @foreach($listbidang as $listbidangs)  
                  <option value="{{$listbidangs->bidangID}}">{{$listbidangs->namaBidang}} </option>
                    @endforeach
                  </select>
                </div>
                <input type="text" value="Katimpel" name="role" hidden>
                <div class="form-group">
                  <label for="Timpelayanan">Tim pelayanan/Kelompok : </label>
                  <select class="form-control" id="Timpelayanan" style="width:80%; float:right" name="kelompok">                  
                  <!-- <option value="0">Non Tim Pelayanan</option> -->
                  <option id="valuefilter" value=""></option>
                  </select>  
                </div>
                <div class="col-md-6 offset-md-3 mt-5">
           <div class="card">
               <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>  
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif                   
                        @csrf
                        <div class="col-md-12">
                            <label class="" for="">Tanda Tangan:</label>
                            <br/>
                            <div id="sig" ></div>
                            <br/>
                            <button id="clear" class="btn btn-danger btn-sm">Hapus</button>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                        </div>
                        <br/>
               </div>
           </div>
       </div>
   </div>                
                

@elseif($tambahrole == "kabid")
<div class="form-group">
<input type="text" value="Kabid" name="role" hidden>
                  <label for="Bidang">BIDANG :</label>
                  <select class="form-control" id="listbidang" style="width:80%; float:right" name="bidangs" onchange="filter()">
                  @foreach($listbidang as $listbidangs)  
                  <option value="{{$listbidangs->bidangID}}">{{$listbidangs->namaBidang}} </option>
                    @endforeach
                  </select>
                </div>
                <select class="form-control" id="" style="width:80%; float:right" name="kelompok" >                  
                    <option value="0" >Non Tim Pelayanan</option>  
                  </select>
<div class="container">

<div class="col-md-6 offset-md-3 mt-5">
           <div class="card">
               <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>  
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif                   
                        @csrf
                        <div class="col-md-12">
                            <label class="" for="">Tanda Tangan:</label>
                            <br/>
                            <div id="sig" ></div>
                            <br/>
                            <button id="clear" class="btn btn-danger btn-sm">Hapus</button>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                        </div>
                        <br/>
               </div>
           </div>
       </div>
   </div>





@elseif($tambahrole == "romo")

<input type="text" value="Romo" name="role" hidden>

<div class="col-md-6 offset-md-3 mt-5">
           <div class="card">
               <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>  
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif                   
                        @csrf
                        <div class="col-md-12">
                            <label class="" for="">Tanda Tangan:</label>
                            <br/>
                            <div id="sig" ></div>
                            <br/>
                            <button id="clear" class="btn btn-danger btn-sm">Hapus</button>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                        </div>
                        <br/>
               </div>
           </div>
       </div>
   </div>

@else
<input type="text" value="Admin" name="role" hidden>

@endif   
                  
                  
                  
                
                <div class="box-footer">
              </div><br><button method="POST" action="" type="submit" class="btn btn-primary">Tambah</button>
            </form>
          </div>    
          <script>

function filter(){
            var drop2 = document.getElementById("Timpelayanan");
var length = drop2.options.length;
for (i = length-1; i >= 0; i--) {
  drop2.options[i] = null;
}
 
            var x = document.getElementById("listbidang").value;
            var datas = @json($listtimpel ->toArray());
           var option = document.createElement("option");
           var selected = datas.filter(data => data.bidangID== x);
           console.log(selected)
           selected.forEach((select) => {
     var option = document.createElement("option");
     option.text = select.namaTimpel;
     option.value = select.timpelID;
     document.getElementById("Timpelayanan").appendChild(option);
})
        }

          </script>       
          <script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>  
@endsection