
@extends('v_lte')
 
@section('form')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/global.css')}}">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form e-Proposal</h3>
            </div>
            <form class="" method="POST" action="{{url('insertdata')}}">
            @csrf
            <!-- /.box-header -->
            <!-- form start -->
              
            <div class="box-body">
                <input type="hidden"  value="{{$username}}" name="username">
                <div class="form-group">
                  <label for="namakegiatan">Judul Proposal :</label>
                  <input type="text" class="form-control" id="judulproposal" style="width:80%; float:right" placeholder="(diisi Judul Proposal)" name="judulproposal"  >
                </div>

                <div class="form-group">
                  <label for="Bidang">BIDANG :</label>
                  <select class="form-control" id="listbidang" style="width:80%; float:right" name="bidangs" onchange="filter()">
                  @foreach($listbidang as $listbidangs)  
                  <option value="{{$listbidangs->bidangID}}">{{$listbidangs->namaBidang}} </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="Timpelayanan">Tim pelayanan/Kelompok : </label>
                  <select class="form-control" id="Timpelayanan" style="width:80%; float:right" name="kelompok">                  
                  <!-- <option value="0">Non Tim Pelayanan</option> -->
                  <option id="valuefilter" value=""></option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="namakegiatan">Nama Kegiatan Utama :</label>
                  <input type="text" class="form-control" id="namakegiatan" style="width:80%; float:right" placeholder="(diisi nama kegiatan utama)" name="nama_kegiatan"  >
                </div>
                <div class="form-group">
                  <label for="nomorRAPB">Nomor RAPB/RAI :</label>
                  <input type="text" class="form-control" id="nomorRAPB" style="width:80%; float:right" placeholder="(diisi nomor kegiatan dalam RAPB)" name="no_rapb_rai"  >
                </div>
                <div class="form-group">
                  <label for="penanggungjawab">Penanggung Jawab :</label>
                  <input type="text" name="nama" class="form-control" id="namapj" placeholder="(Nama Penanggung Jawab)"  >
                  <input type="text" name="nik" class="form-control" id="nikpj" placeholder="(diisi NIK yang tercatat di data umat)"  >
                  <input type="text" name="no_rekening" class="form-control" id="norek" placeholder="(diisi nomor rekening bila untuk transfer dana anggaran)"  >
                  <input type="tel" pattern="\(\+\6\2\)-\d\d\d\d\d\d\d\d\d"  name="no_wa" class="form-control" id="nowa" placeholder="(diisi nomor yang bisa dikontak)"  >
                </div>
                <div>
                <label for="sasaran">Sasaran Strategis :</label> 
                <input class="form-control" type="text" style="width:80%; float:right" placeholder="Masukkan Sasaran Strategis" name="sasaran"  >
                </div>
                <br>
                <br>
                <div >
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

             </div>

    
     
      
              </div>
              
              <div class="container">
      <button class="submit">kirim</button>
    </div>
    <br>
    <br>
    <br>
    @include('sweetalert::alert')
</form>

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

                function addRowAng()
    {
        var tr='<tr>'+
        '<td><input type="text" name="Keperluan[]" class="form-control"   ></td>'+
        '<td><input type="text" name="Jumlah[]" class="form-control"   ></td>'+
        '<td><input type="number" name="Satuan[]" class="form-control Satuan"   ></td>'+
        '<td><input type="text" name="Harga[]" class="form-control Harga"   ></td>'+
        '<td><input type="text" name="Subtotal[]" class="form-control Subtotal" ></td>'+
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
        var last=$('tbody.IT tr').length;
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