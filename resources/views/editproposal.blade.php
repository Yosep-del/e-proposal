
@extends('v_lte')
 
 @section('form')
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <link href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
 <link rel="stylesheet" type="text/css" href="{{ asset('css/global.css')}}">
 <div class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title">yang belum ter-approve</h3>
             </div>
             
             <form action="{{url('/editproposal')}}" method="POST" >
             
             @csrf
             <!-- /.box-header -->
             <!-- form start -->
             
             <input type="text" name="usernames" value="{{$username}}" hidden>
             
             @foreach($dataapprove as $dataapproves)
             <input type="text" name="proposalID" value="{{$dataapproves->proposalID}}" hidden>
             @endforeach
               <div class="box-body">
                 <div class="form-group">
                   <label for="Bidang">BIDANG</label>
                   <select class="form-control"  name="bidang" required>
                     <option value="@foreach($dataapprove as $dataapproves) {{$dataapproves->bidangID}} @endforeach"> @foreach($databidang as $databidangs)<span>{{$databidangs->namaBidang}}</span>@endforeach</option>
                   </select>
                 </div>
                 <div class="form-group">
                   <label for="Timpelayanan">Tim pelayanan/Kelompok</label>
                   <select class="form-control" id="Timpelayanan"  name="kelompok" required>
                     <option value="@foreach($dataapprove as $dataapproves) {{$dataapproves->timpelID}} @endforeach">@foreach($datatimpel as $datatimpels) {!! $datatimpels->namaTimpel !!} @endforeach</option>
                   </select>
                 </div>
                 <div class="form-group">
                   <label for="namakegiatan">Nama Kegiatan Utama</label>
                   <input type="text" class="form-control" id="namakegiatan" placeholder="@foreach($dataapprove as $dataapproves) {!! $dataapproves->namaKegiatan !!} @endforeach" name="nama_kegiatan" required>
                 </div>
                 <div class="form-group">
                   <label for="nomorRAPB">Nomor RAPB/RAI</label> 
                   <input type="text" class="form-control" id="nomorRAPB" readonly placeholder="@foreach($dataapprove as $dataapproves) {{$dataapproves->nomorRAPB}} @endforeach" name="no_rapb_rai" required>
                 </div>
                 <div class="form-group">
                   <label for="penanggungjawab">Penanggung Jawab</label>
                   <input type="text" name="nama" class="form-control" id="namapj"  placeholder="@foreach($dataapprove as $dataapproves){{$dataapproves->namaPJ}} @endforeach" required>
                   <input type="text" name="nik" class="form-control" id="nikpj"  placeholder="@foreach($dataapprove as $dataapproves){{$dataapproves->NIKPJ}} @endforeach" required>
                   <input type="text" name="no_rekening" class="form-control" id="norek"  placeholder="@foreach($dataapprove as $dataapproves){{$dataapproves->bank}} @endforeach" required>
                   <input type="tel" pattern="\(\+\6\2\)-\d\d\d\d\d\d\d\d\d"  name="no_wa" class="form-control" id="nowa" placeholder="@foreach($dataapprove as $dataapproves){{$dataapproves->no_hp}} @endforeach" required>
                 </div>
                 <div>
                 <label for="sasaran">Sasaran Strategis</label> 
                 <input class="form-control" type="text"  placeholder="@foreach($dataapprove as $dataapproves){{$dataapproves->sasaranStrategis}} @endforeach" name="sasaran" required>
                 </div>
                 <label for="">Indikator & Target</label>
                 <section>
                 <div class="panel panel-footer" >
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th>Indikator Deskripsi</th>
                             <th>Target</th>
                             <th><a href="javascript:void(0)" class="addRowIT"><i class="fas fa-plus"></i></a></th>
                         </tr>
                     </thead>
                     <tbody class="IT">
                        <tr>
                            <td><input type="text" name="Indikator[]" class="form-control" ></td>
                            <td><input type="text" name="Target[]" class="form-control" ></td>   
                            <td><a href="javascript:void(0)" class="btn btn-danger removeIT"><i class="fas fa-times"></i></a></td>
                        </tr>
                         </tr>
                     </tbody>
                 </table>
             </div>
         </section>
          </div>
          <label for="">Rincian Kegiatan : </label>
     
     <section>
         <div class="panel panel-footer" >
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>Kegiatan</th>
                         <th>Tempat</th>
                         <th>Waktu Mulai</th>
                         <th>Waktu Selesai</th>
                         <th><a href="javascript:void(0)" class="addRowRK"><i class="fas fa-plus"></i></a></th>
                     </tr>
                 </thead>
                 <tbody class="RK">
                    <tr>
                        <td><input type="text" name="Kegiatan[]" class="form-control" ></td>
                        <td><input type="text" name="Tempat[]" class="form-control" ></td>   
                        <td><input type="datetime-local"  name="Waktu_mulai[]" class="form-control" ></td>
                        <td><input type="datetime-local" name="Waktu_selesai[]" class="form-control" ></td>
                        <td><a href="javascript:void(0)" class="btn btn-danger removeRK"><i class="fas fa-times"></i></a></td>
                    </tr>
                     </tr>
                 </tbody>
                 
             </table>
         </div>
     </section>
     <div >
  <label for="">Anggaran</label>

     <section>
         <div class="panel panel-footer" >
             <table class="table table-bordered table-condensed">
                 <thead>
                     <tr >
                         <th>Keperluan</th>
                         <th>Satuan</th>
                         <th>Jumlah Satuan</th>
                         <th>Harga Satuan</th>
                         <th>Subtotal</th>
                         <th>Sumber Dana</th>
                         <th><a href="javascript:void(0)" class="addRowAng"><i class="fas fa-plus"></i></a></th>
                     </tr>
                 </thead>
                 <tbody class="Ang">
                    <tr>
                        <td><input type="text" name="Keperluan[]" class="form-control"   ></td>
                        <td><input type="text" name="Jumlah[]" class="form-control"   ></td>   
                        <td><input type="number" name="Satuan[]" class="form-control Satuan"   ></td>
                        <td><input type="text" name="Harga[]" class="form-control Harga"   ></td>
                        <td><input type="text" name="Subtotal[]" class="form-control Subtotal" ></td>
                        <td><select class="form-control" style="width:100%; float:right" name="sumberdana[]
                        "  >
                @foreach($listsumberdana as $listsumberdanas)
                <option value="{{$listsumberdanas->sumberID}}">{{$listsumberdanas->sumberDeskripsi}}</option>
                @endforeach
              </select></td>
                        <td><a href="javascript:void(0)" class="btn btn-danger removeAng"><i class="fas fa-times" ></i></a></td>
                    </tr>
                     </tr>
                 </tbody>
                 <tfoot>
                     <tr>
                         <td style="border: none"></td>
                         <td style="border: none"></td>
                         <td style="border: none"></td>
                         <td style="font-size:120%">Total</td>
                         <td><input type="text" class="total" name="initotal"  hidden ><b class="total"></b></td>
                         <td style="border: none"></td>
                         <td style="border: none"></td>
                     </tr>
                 </tfoot>
             </table>
         </div>
     </section>
  
</div>
               <div class="container">
       <span>Last update: <span>@foreach($dataapprove as $dataapproves) {!! $dataapproves->tanggalUpdate !!} @endforeach</span></span>
     </div>
               <div class="container">
       <button class="submit">Selesai Edit</button>
     </div>
     <br>
     <br>
     <br>
     </form>
     <script>
    function addRowAng()
    {
        var tr='<tr>'+
        '<td><input type="text" name="Keperluan[]" class="form-control"></td>'+
        '<td><input type="text" name="Jumlah[]" class="form-control"></td>'+
        '<td><input type="number" name="Satuan[]" class="form-control Satuan"></td>'+
        '<td><input type="text" name="Harga[]" class="form-control Harga"></td>'+
        '<td><input type="text" name="Subtotal[]" class="form-control Subtotal"></td>'+
        '<td><select class="form-control" style="width:100%; float:right" name="sumberdana[]">@foreach($listsumberdana as $listsumberdanas)<option value="{{$listsumberdanas->sumberID}}">{{$listsumberdanas->sumberDeskripsi}}</option>@endforeach</select></td>'+
        '<td><a href="javascript:void(0)" class="btn btn-danger removeAng"><i class="fas fa-times"></i></a></td>'+
        '</tr>';
        $('tbody.Ang').append(tr);
    };
    $('tbody').delegate('.Satuan,.Harga','keyup',function(){
        var tr=$(this).parent().parent();
        var Satuan=tr.find('.Satuan').val();
        var Harga=tr.find('.Harga').val();
        var Subtotal=(Satuan*Harga);
        tr.find('.Subtotal').val(Subtotal);
        total();
    });
    function total(){
        var total=0;
        $('.Subtotal').each(function(i,e){
            var Subtotal=$(this).val()-0;
        total +=Subtotal;
    });
    $('.total').html("Rp"+total.toLocaleString());   
    }
    $('.addRowIT').on('click',function(){
        addRowIT();
    });
    $('.addRowRK').on('click',function(){
        addRowRK();
    });
    $('.addRowAng').on('click',function(){
        addRowAng();
    });
    $('.daftar').on('click',function(){
        daftar();
    });
    function addRowIT()
    {
        var tr='<tr>'+
        '<td><input type="text" name="Indikator[]" class="form-control"></td>'+
        '<td><input type="text" name="Target[]" class="form-control"></td>'+
        '<td><a href="javascript:void(0)" class="btn btn-danger removeIT"><i class="fas fa-times"></i></a></td>'+
        '</tr>';
        $('tbody.IT').append(tr);
    };
    function addRowRK()
    {
        var tr='<tr>'+
        '<td><input type="text" name="Kegiatan[]" class="form-control"></td>'+
        '<td><input type="text" name="Tempat[]" class="form-control"></td>'+
        '<td><input type="datetime-local" name="Waktu_mulai[]" class="form-control"></td>'+
        '<td><input type="datetime-local" name="Waktu_selesai[]" class="form-control"></td>'+
        '<td><a href="javascript:void(0)" class="btn btn-danger removeRK"><i class="fas fa-times"></i></a></td>'+
        '</tr>';
        $('tbody.RK').append(tr);
    };
     $('.removeIT').on('click',function(){
        var last = $('tbody.IT tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    });
    $('.removeRK').on('click',function(){
        var last=$('tbody.RK tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    
    });
    $('.removeAng').on('click',function(){
        var last=$('tbody.Ang tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    
    });
            </script>  
               
 @endsection

